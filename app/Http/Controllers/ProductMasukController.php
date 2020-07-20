<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Datatables;

use App\Http\Requests\ProductMasukRequest;
use App\Product;
use App\Product_Masuk;
use App\Supplier;
use Session;
use Illuminate\Http\Request;

class ProductMasukController extends Controller
{
public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {

        $productmasuk_list = Product_Masuk::paginate(3);
        $jumlah_product = Product_Masuk::count();
        return view('product_masuk.index', compact('productmasuk_list', 'jumlah_product'));
    }
    public function show(ProductMasuk $ProductMasuk) {
        //return view('products.show', compact('product'));
    }
    public function create() {
        return view('product_masuk.create');
    }
    public function edit(ProductMasuk $ProductMasuk) {
     
     //   return view('products.edit', compact('product'));
    }
    public function store(ProductMasukRequest $request) {
        $input = $request->all();
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request);
        }
        $ProductMasuk = Product_Masuk::create($input);
      

        $product = Product::findOrFail($request->product_id);
        $product->qty += $request->qty;
        $product->save();
        Session::flash('flash_message', 'Data  berhasil disimpan.');
        return redirect('productsIn');
    }
    public function update(ProductMasuk $product, ProductMasukRequest $request) {
        $input = $request->all();
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->updateFoto($ProductMasuk, $request);
        }
        $product->update($input);
        $this->updateTelepon($ProductMasuk, $request);
        Session::flash('flash_message', 'Data  berhasil diupdate.');
        return redirect('productsIn');
    }
    public function destroy(ProductMasuk $ProductMasuk) {
        // $this->hapusFoto($ProductMasuk);
        // $ProductMasuk->delete();
        // Session::flash('flash_message', 'Data  berhasil dihapus.');
        // Session::flash('penting', true);
        // return redirect('productsIn');
    }
    // public function cari(Request $request) {
    //     $kata_kunci = trim($request->input('kata_kunci'));
    //     if (! empty($kata_kunci)) {
    //         $name = $request->input('name');
    //         $category_id = $request->input('category_id');
    //         $query = Product_Masuk::where('name', 'LIKE', '%' . $kata_kunci . '%');
    //         (! empty($jenis_kelamin)) ? $query->JenisKelamin($jenis_kelamin) : '';
    //         (! empty($id_posisi)) ? $query->Posisi($id_posisi) : '';
    //         $product_list = $query->paginate(2);
    //         $pagination = (! empty($jenis_kelamin)) ? $product_list->appends(['jenis_kelamin' => $jenis_kelamin]) : '';
    //         $pagination = (! empty($id_posisi)) ? $pagination = $product_list->appends(['id_posisi' => $id_posisi]) : '';
    //         $pagination = $product_list->appends(['kata_kunci' => $kata_kunci]);
    //         $jumlah_product = $product_list->total();
    //         return view('products.index', compact('product_list', 'kata_kunci', 'pagination', 'jumlah_product', 'id_posisi', 'jenis_kelamin'));
    //     }
    //     return redirect('product_masuk');
    // }
  
    
   
 



}
