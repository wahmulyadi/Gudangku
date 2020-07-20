@extends('layouts.master')


@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Data Produk Masuk</h3>
</div>
<div class="box-header">
<a href="{{ url('productsIn/create') }}" class="btn btn-primary">Tambah Product</a>
<!-- <a onclick="addForm()" class="btn btn-primary">Add Products</a> -->
        </div>


        <!-- /.box-header -->
        <div class="box-body">
        
        @if (!empty($productmasuk_list))
            <table id="products-table" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Supplier</th>
                    <th>Tanggal</th>
                    <th>QTY</th>
                </tr>
                </thead>
                <?php $i = 0; ?>
                @foreach($productmasuk_list as $productmasuk)
                <tbody>
                <th>{{ ++$i }}</th>
                    <td>{{ $productmasuk->product->nama }}</td>
                    <td>{{ $productmasuk->supplier->nama }}</td>
                    <td>{{ $productmasuk->tanggal }}</td>
                    <td>{{ $productmasuk->qty }}</td>
                    
                    @endforeach
                </tbody>
            </table>
            @else
                <p>Tidak ada data product.</p>
            @endif
        

        <div class="table-nav">
             <div class="jumlah-data">
                 <strong> Jumlah Product Masuk: {{ $jumlah_product }} </strong>
             </div>
             <div class="paging">
                {{ $productmasuk_list->links() }}
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    </div>
    @stop