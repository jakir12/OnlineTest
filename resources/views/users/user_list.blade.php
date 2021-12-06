@extends('layouts.admin_master')
@section('title',"User List")
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        User
            <small>User List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User</a></li>
            <li class="active">User List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">User List</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>User Type</th>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($userList as $value)    
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @if($value['user_type'] =='1')
                                              <label class='label label-success'>{{'Admin'}}</label> 
                                            @else
                                            <label class='label label-primary'>{{'Employee'}}</label>  
                                            @endif
                                        </td>
                                        <td>{{ $value['name'] }}</td>
                                        <td>{{$value['mobile']}}</td>
                                        <td>{{$value['email']}}</td>
                                        <td>
                                            <a href="#"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                            <a href="#"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                        </td>
                                    </tr>
                                  @endforeach  
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
