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
        <a href="user/create" class="btn btn-primary" >Add User</a>
        </div>


        <!-- /.box-header -->
        <div class="box-body">
        @if (count($user_list) > 0)
            <table id="user-table" class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php $i = 0; ?>
                    @foreach($user_list as $user)
                <tbody>
                <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->level }}</td>
                        <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['UserController@destroy', $user->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {{ link_to('user/' . $user->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                            
                            
                                
                                {!! Form::close() !!}
                         
                            @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <!-- /.box-body -->
    </div>

@endsection
