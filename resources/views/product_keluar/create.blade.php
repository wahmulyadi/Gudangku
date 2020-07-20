@extends('layouts.master')


@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Data Products Keluar</h3>
</div>
<div class="box-header">
<a href="{{ url('productsIn') }}" class="btn btn-danger">Kembali</a>
<!-- <a onclick="addForm()" class="btn btn-primary">Add Products</a> -->
        </div>


        <!-- /.box-header -->
        <div class="box-body">
        
        {!! Form::open(['url' => 'productsOut', 'files' => true]) !!}
            @include('product_keluar.form', ['submitButtonText' => 'Tambah Product'])
        {!! Form::close() !!}
        </div>
        </div>
    @stop
