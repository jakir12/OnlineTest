@extends('layouts.admin_master')
@section('title',"Add Allocation")
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Allocation
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Add Allocation</a></li>
            <li class="active">Preview</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Allocation</h3>
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
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{url('create-allocation')}}" role="form">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="employee_id">Employee <span style="color: red;font-weight: bold;"> *</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <select name="employee_id" id="employee_id" class="form-control select2" style="width: 100%;" required>
                                                <option value="">Select Employee</option>
                                                @foreach($userList as $emp)
                                                <option value="{{$emp->id}}">{{$emp->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="asset_id">Asset <span style="color: red;font-weight: bold;"> *</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <select name="asset_id" id="asset_id" class="form-control select2" style="width: 100%;" required>
                                                <option value="">Select Asset</option>
                                                @foreach($assetList as $asset)
                                                <option value="{{$asset->id}}">{{$asset->asset_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date </label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="allocation_date" class="form-control pull-right" id="datepicker" autocomplete="off">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <button type="submit" name="saveAllocation" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection