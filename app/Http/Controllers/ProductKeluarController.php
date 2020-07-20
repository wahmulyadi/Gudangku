<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductKeluarRequest;
use App\Product;
use App\Product_Keluar;
use App\Customer;
use Session;
use Illuminate\Http\Request;

class ProductKeluarController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        $productkeluar_list = Product_Keluar::paginate(3);
        $jumlah_product = Product_Keluar::count();
        return view('product_keluar.index', compact('productkeluar_list', 'jumlah_product'));
    }
    public function show(Productkeluar $Productkeluar) {
        //return view('products.show', compact('product'));
    }
    public function create() {
        return view('product_keluar.create');
    }
    public function edit(Productkeluar $Productkeluar) {
     
     //   return view('products.edit', compact('product'));
    }
    public function store(ProductkeluarRequest $request) {
        $input = $request->all();
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request);
        }
        $Productkeluar = Product_Keluar::create($input);
       

        $product = Product::findOrFail($request->product_id);
        $product->qty -=     $request->qty;
        $product->save();
        Session::flash('flash_message', 'Data  berhasil disimpan.');
        return redirect('productsOut');
    }
    public function update(Productkeluar $product, ProductkeluarRequest $request) {
        $input = $request->all();
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->updateFoto($Productkeluar, $request);
        }
        $product->update($input);
        $this->updateTelepon($Productkeluar, $request);
        Session::flash('flash_message', 'Data  berhasil diupdate.');
        return redirect('productsOut');
    }
    public function destroy(Productkeluar $Productkeluar) {
        // $this->hapusFoto($Productkeluar);
        // $Productkeluar->delete();
        // Session::flash('flash_message', 'Data  berhasil dihapus.');
        // Session::flash('penting', true);
        // return redirect('productsOut');
    }
}
