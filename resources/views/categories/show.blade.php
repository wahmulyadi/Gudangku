@extends('layouts.master')


@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
<div class="box">

<div class="box-header">
    <h3 class="box-title">Detai</h3>
</div>

<div class="box-header">
    <a href="{{ url('categories.index') }}" class="btn btn-primary" >Back to Categories</a>
   </div>