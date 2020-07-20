@extends('layouts.master')


@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<div class="box">

<div class="box-header">
    <h3 class="box-title">Data User</h3>
</div>
<div class="box-header">
<a href="{{ url('user') }}" class="btn btn-danger">Kembali</a>

</div>


<!-- /.box-header -->
<div class="box-body">

    {!! Form::open(['url' => 'user']) !!}
    @include('user.form', ['submitButtonText' => 'Tambah User'])
    {!! Form::close() !!}
    </div>
        </div>
@stop