@extends('layouts.admin_master')
@section('title',"Asset Category")
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Asset Category
            <small>Asset Category List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Asset Category</a></li>
            <li class="active">Asset Category List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Asset Category List</h3>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <h4 style="color: #F8E539;text-align: center;font-weight: bold;">{{ $error }}</h4>
                            @endforeach
                            @endif
                            @if(session('successMsg'))
                            <h4 style="color: #40b85c;text-align: center;">{{ session('successMsg') }}</h4>
                        @endif
                        @if(session('errorMsg'))
                            <h4 style="color: #de4328;text-align: center;">{{ session('errorMsg') }}</h4>
                        @endif
                        <div class="box-tools pull-right">
                            <button type="button" data-toggle="modal" data-target="#add" class="btn bg-navy btn-flat">Add New</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Asset Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($assetCatInfo as $val)    
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$val->asset_category}}</td> 
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
<div id="add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2E4D62;color: #fff">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('create-category')}}">
                 @csrf
                    <div class="form-group">
                        <label for="asset_category">Category</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                            <input type="text" name="asset_category" id="asset_category" class="form-control" placeholder="Asset Category" autocomplete="off">
                        </div>
                    </div>
                    <input type="submit" name="add_btn" value="Insert" class="btn btn-success pull-right" />
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
@endsection
