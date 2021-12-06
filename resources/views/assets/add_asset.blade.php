@extends('layouts.admin_master')
@section('title',"Add Asset")
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Asset
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Add Asset</a></li>
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
              <h3 class="box-title">Add Asset</h3>
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
            <form method="POST" action="{{url('create-asset')}}" role="form">
              @csrf
              <div class="box-body">
			      <div class="row">
				   <div class="col-md-6">
					   <div class="form-group">
						 <label for="asset_name">Asset Name <span style="color: red;font-weight: bold;"> *</span></label>
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="text" name="asset_name" id="asset_name" class="form-control" placeholder="Enter asset name" autocomplete="off" required>
						  </div>
						</div>
				   </div>
		           <div class="col-md-6">
                     <div class="form-group">
                        <label for="category_id">Category <span style="color: red;font-weight: bold;"> *</span></label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <select name="category_id" id="category_id" class="form-control select2" style="width: 100%;" required>
                        <option value="">Select Category</option>
                            <option value="1">Accessories</option>
                            <option value="2">Electronics</option>
                            <option value="3">Others</option>
                        </select>
                        </div>
                    </div>
                </div>
		      </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <button type="submit" name="saveAsset" class="btn btn-primary">Submit</button>
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
