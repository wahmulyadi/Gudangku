@extends('layouts.master')


@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Data Products</h3>
</div>
<div class="box-header">
<a href="{{ url('products/create') }}" class="btn btn-primary">Tambah Product</a>
<!-- <a onclick="addForm()" class="btn btn-primary">Add Products</a> -->
@include('products.form_pencarian')  
        </div>
       

        <!-- /.box-header -->
        <div class="box-body">
        
        @if (!empty($product_list))
            <table id="products-table" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Category</th>
                    <th>Harga</th>
                    <th>QTY</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php $i = 0; ?>
                @foreach($product_list as $product)
                <tbody>
            
                <th>{{ ++$i }}</th>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->harga }}</td>
                    <td>{{ $product->qty }}</td>
                    <td> 
                    @if (Auth::check())
                              
                            
                                {!! Form::open(['method' => 'DELETE', 'action' => ['ProductController@destroy', $product->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {{ link_to('products/' . $product->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                        
                                {{ link_to('products/' . $product->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
                                {!! Form::close() !!}

                            
                          </td>@endif
                    @endforeach
                </tbody>
            </table>
            @else
                <p>Tidak ada data product.</p>
            @endif
        

        <div class="table-nav">
             <div class="jumlah-data">
                 <strong> Jumlah Product: {{ $jumlah_product }} </strong>
             </div>
             <div class="paging">
                {{ $product_list->links() }}
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    </div>
    @stop