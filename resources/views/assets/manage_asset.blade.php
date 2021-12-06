@extends('layouts.admin_master')
@section('title',"Asset List")
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Asset
            <small>Asset List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Asset</a></li>
            <li class="active">Asset List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Asset List</h3>
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
                                        <th>Asset Name</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($assetInfo as $assets)    
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$assets->asset_name}}</td>
                                        <td> 
                                            @if($assets->category_id =='1')
                                               <span class="label label-success">Accessories</span>
                                            @elseif($assets->category_id =='2')
                                                <span class="label label-danger">Electronics</span>
                                            @else
                                                <span class="label label-info">Others</span>
                                            @endif
                                        </td>
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
