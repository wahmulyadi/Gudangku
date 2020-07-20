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
        {{link_to('categories/create', 'Cancel', ['class' => 'btn btn-primary '])}}
            <a onclick="addForm()" class="btn btn-primary" >Add Categories</a>
           </div>

           @if (!empty($categories))
        <!-- /.box-header -->
        <div class="box-body">
            <table id="categories-table" class="table table-striped">
                <thead>
                <tr>
                <th>ID</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
                </thead>
                categories
                <tbody>
                @foreach($categories as $categories)
                <tr>
                        <td> {{ $categories->id }}</td>
                        <td>{{ $categories->name }}</td>
                        <td>
                            <div class="box-button">
                            @if (Auth::check())
                                {{ link_to('categories/' . $categories->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                                {!! Form::open(['method' => 'DELETE', 'action' => ['CategoryController@destroy', $categories->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                            @endif
                                {{ link_to('categories/' . $categories->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
                          

                          

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <!-- /.box-body -->
    </div>
    @endsection