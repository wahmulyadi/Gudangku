<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Storage;
use Session;
use Yajra\DataTables\Datatables;
class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'index', 'show', 'cari'
        ]]);
    }
    public function index() {
        $product_list = Product::paginate(3);
        $jumlah_product = Product::count();
        return view('products.index', compact('product_list', 'jumlah_product'));
    }
    public function show(Product $product) {
        return view('products.show', compact('product'));
    }
    public function create() {
        return view('products.create');
    }
    public function edit(Product $product) {
     
        return view('products.edit', compact('product'));
    }
    public function store(ProductRequest $request) {
        $input = $request->all();
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request);
        }
        $product = product::create($input);
       
        Session::flash('flash_message', 'Data product berhasil disimpan.');
        return redirect('products');
    }
    public function update(Product $product, ProductRequest $request) {
        $input = $request->all();
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->updateFoto($product, $request);
        }
        $product->update($input);
        $this->updateTelepon($product, $request);
        Session::flash('flash_message', 'Data product berhasil diupdate.');
        return redirect('products');
    }
    public function destroy(Product $product) {
        $this->hapusFoto($product);
        $product->delete();
        Session::flash('flash_message', 'Data product berhasil dihapus.');
        Session::flash('penting', true);
        return redirect('products');
    }
    public function cari(Request $request) {
        $kata_kunci = trim($request->input('kata_kunci'));
        if (! empty($kata_kunci)) {
            $barang = $request->input('nama');
            $category_id = $request->input('category_id');
            $query = Product::where('nama', 'LIKE', '%' . $kata_kunci . '%');
            (! empty($barang)) ? $query->barang($barang) : '';
            (! empty($category_id)) ? $query->Posisi($category_id) : '';
            $product_list = $query->paginate(2);
            $pagination = (! empty($barang)) ? $product_list->appends(['nama' => $barang]) : '';
            $pagination = (! empty($category_id)) ? $pagination = $product_list->appends(['category_id' => $category_id]) : '';
            $pagination = $product_list->appends(['kata_kunci' => $kata_kunci]);
            $jumlah_product = $product_list->total();
            return view('products.index', compact('product_list', 'kata_kunci', 'pagination', 'jumlah_product', 'category_id', 'barang'));
        }
        return redirect('products');
    }
    private function insertTelepon(Product $product, ProductRequest $request) {
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $product->telepon()->save($telepon);
    }
    private function updateTelepon(Product $product, ProductRequest $request) {
        if ($product->telepon) {
            if ($request->filled('nomor_telepon')) {
                $telepon = $product->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $product->telepon()->save($telepon);
            }
            else {
                $product->telepon()->delete();
            }
        }
        else {
            if ($request->filled('nomor_telepon')) {
                $telepon = new Telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $product->telepon()->save($telepon);
            }
        }
    }
    private function uploadFoto(ProductRequest $request) {
        $foto = $request->file('foto');
        $ext  = $foto->getClientOriginalExtension();
        if ($request->file('foto')->isValid()) {
            $foto_name   = date('YmdHis'). ".$ext";
            $request->file('foto')->move('fotoupload', $foto_name);
            return $foto_name;
        }
        return false;
    }
    private function updateFoto(Product $product, ProductRequest $request) {
        if ($request->hasFile('foto')) {
            $exist = Storage::disk('foto')->exists($product->foto);
            if (isset($product->foto) && $exist) {
                $delete = Storage::disk('foto')->delete($product->foto);
            }
            $foto = $request->file('foto');
            $ext  = $foto->getClientOriginalExtension();
            if ($request->file('foto')->isValid()) {
                $foto_name   = date('YmdHis'). ".$ext";
                $upload_path = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                return $foto_name;
            }
        }
    }
    private function hapusFoto(Product $product) {
        $is_foto_exist = Storage::disk('foto')->exists($product->foto);

        if ($is_foto_exist) {
            Storage::disk('foto')->delete($product->foto);
        }
    }






























/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//     public function index()
//     {
//         $product = Product::all();
//         return view('products.index', compact('category'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $category = Category::orderBy('name','ASC')
//             ->get()
//             ->pluck('name','id');

//         $this->validate($request , [
//             'nama'          => 'required|string',
//             'harga'         => 'required',
//             'qty'           => 'required',
//             'image'         => 'required',
//             'category_id'   => 'required',
//         ]);

//         $input = $request->all();
//         $input['image'] = null;

//         if ($request->hasFile('image')){
//             $input['image'] = '/upload/products/'.str_slug($input['nama'], '-').'.'.$request->image->getClientOriginalExtension();
//             $request->image->move(public_path('/upload/products/'), $input['image']);
//         }

//         Product::create($input);

//         return response()->json([
//             'success' => true,
//             'message' => 'Products Created'
//         ]);

//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         $category = Category::orderBy('name','ASC')
//             ->get()
//             ->pluck('name','id');
//         $product = Product::find($id);
//         return $product;
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         $category = Category::orderBy('name','ASC')
//             ->get()
//             ->pluck('name','id');

//         $this->validate($request , [
//             'nama'          => 'required|string',
//             'harga'         => 'required',
//             'qty'           => 'required',
// //            'image'         => 'required',
//             'category_id'   => 'required',
//         ]);

//         $input = $request->all();
//         $produk = Product::findOrFail($id);

//         $input['image'] = $produk->image;

//         if ($request->hasFile('image')){
//             if (!$produk->image == NULL){
//                 unlink(public_path($produk->image));
//             }
//             $input['image'] = '/upload/products/'.str_slug($input['nama'], '-').'.'.$request->image->getClientOriginalExtension();
//             $request->image->move(public_path('/upload/products/'), $input['image']);
//         }

//         $produk->update($input);

//         return response()->json([
//             'success' => true,
//             'message' => 'Products Update'
//         ]);
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         $product = Product::findOrFail($id);

//         if (!$product->image == NULL){
//             unlink(public_path($product->image));
//         }

//         Product::destroy($id);

//         return response()->json([
//             'success' => true,
//             'message' => 'Products Deleted'
//         ]);
//     }

//     public function apiProducts(){
//         $product = Product::all();

//         return Datatables::of($product)
//             ->addColumn('category_name', function ($product){
//                 return $product->category->name;
//             })
//             ->addColumn('show_photo', function($product){
//                 if ($product->image == NULL){
//                     return 'No Image';
//                 }
//                 return '<img class="rounded-square" width="50" height="50" src="'. url($product->image) .'" alt="">';
//             })
//             ->addColumn('action', function($product){
//                 return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> ' .
//                     '<a onclick="editForm('. $product->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
//                     '<a onclick="deleteData('. $product->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
//             })
//             ->rawColumns(['category_name','show_photo','action'])->make(true);

//     }
}
