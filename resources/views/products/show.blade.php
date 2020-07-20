@extends('layouts.master')
@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
<div class="box">
<div class="box-header">
    <h3 class="box-title">Detail Product</h3>
</div>
<div class="box-header">
<a href="{{ url('products') }}" class="btn btn-danger">Kembali</a>
</div>
<div class="box-body">
<table class="table table-striped">
             <tr>
                 <th>Nama</th>
                <td>{{ $product->nama }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>{{ $product->harga }}</td>
            </tr>
          
            <tr>
                <th>Harga</th>
                <td>{{ $product->harga }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{{$product->qty }}</td>
            </tr>
           
                <th>Foto</th>
                <td>
                    @if (isset($product->foto))
                        <img src="{{ asset('fotoupload/' . $product->foto) }}">
                    @else
                       
                            <img src="{{ asset('fotoupload/dummyfemale.jpg') }}">
                      
                    @endif
                </td>
            </tr>
        </table>




    </div>
        </div>
@stop