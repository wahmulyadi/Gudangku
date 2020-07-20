<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Yajra\DataTables\DataTables;
class SupplierController extends Controller
{
public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index() {
		$suppliers = Supplier::all();
		return view('suppliers.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'nama' => 'required',
			'alamat' => 'required',
			'email' => 'required|unique:suppliers',
			'telepon' => 'required',
		]);

		Supplier::create($request->all());

		return response()->json([
			'success' => true,
			'message' => 'Suppliers Created',
		]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$supplier = Supplier::find($id);
		return $supplier;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->validate($request, [
			'nama' => 'required|string|min:2',
			'alamat' => 'required|string|min:2',
			'email' => 'required|string|email|max:255',
			'telepon' => 'required|string|min:2',
		]);

		$supplier = Supplier::findOrFail($id);

		$supplier->update($request->all());

		return response()->json([
			'success' => true,
			'message' => 'Supplier Updated',
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Supplier::destroy($id);

		return response()->json([
			'success' => true,
			'message' => 'Supplier Delete',
		]);
	}

	public function apiSuppliers() {
		$suppliers = Supplier::all();

		return Datatables::of($suppliers)
			->addColumn('action', function ($suppliers) {
				return '<a onclick="editForm(' . $suppliers->id . ')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
				'<a onclick="deleteData(' . $suppliers->id . ')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			})
			->rawColumns(['action'])->make(true);
	}

}

