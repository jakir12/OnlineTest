 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
         <li class="active">
          <a href="/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Allocation</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">  
            @if($user_type = Auth::user()->user_type =='1')    
              <li><a href="{{url('/add-allocation')}}"><i class="fa fa-circle-o"></i> Add Allocation</a></li>
            @endif   
              <li><a href="{{url('/allocation-list')}}"><i class="fa fa-circle-o"></i> Allocated Asset List</a></li>
              <li><a href="{{url('/remaining-asset')}}"><i class="fa fa-circle-o"></i> Remaining Asset List</a></li>
            </ul>
          </li>



        @if($user_type = Auth::user()->user_type =='1')  
          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Manage Asset</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">  
              <li><a href="{{url('/add-asset')}}"><i class="fa fa-circle-o"></i> Add Asset</a></li>
              <li><a href="{{url('/asset-list')}}"><i class="fa fa-circle-o"></i> Asset List</a></li>
              <li><a href="{{url('/category-list')}}"><i class="fa fa-circle-o"></i> Asset Category</a></li>
            </ul>
          </li>
        @endif 

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($user_type = Auth::user()->user_type =='1')
            <li><a href="{{url('/add-user')}}"><i class="fa fa-circle-o"></i> Add User</a></li>
            @endif  
            <li><a href="{{url('/user-list')}}"><i class="fa fa-circle-o"></i> User List</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
