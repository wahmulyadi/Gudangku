@extends('layouts.master')


@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<div class="box">

<div class="box-header">
    <h3 class="box-title">Data Product</h3>
</div>
<div class="box-header">
<a href="{{ url('products') }}" class="btn btn-danger">Kembali</a>

</div>


<!-- /.box-header -->
<div class="box-body">

{!! Form::model($product, ['method' => 'PATCH', 'action' => ['ProductController@update', $product->id]]) !!}
@include('products.form', ['submitButtonText' => 'Update'])
{!! Form::close() !!}
    </div>
        </div>
@stop