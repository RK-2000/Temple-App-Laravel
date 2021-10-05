<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::to('/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ URL::to('/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href=" {{ URL::to('/assets/css/style.css') }} ">
    @yield('custom_scripts')    
    <link rel="shortcut icon" href="{{ URL::to('/assets/images/favicon.ico')}}" />
    <style>
      #logo{
        width: 80px;
        height: 100%;
      }
      #mini-logo{
        width:60px;
        height:100%;

      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img id="logo" src="{{URL::to('/assets/images/Logo_Khidkaleshwar.png')}} " alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img id="mini-logo" src="{{URL::to('/assets/images/Logo_Khidkaleshwar.png')}}" alt="logo" width="100px" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link Route::get('/dashboard',[App\Http\Controllers\admin\AdminDashboardController::class,'index'])->name('admin.dashboard');dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">{{Auth::user()->email}}</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{route ('admin.logout')}}">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ Auth::user()->email }}</span>
                  <span class="text-secondary text-small">Admin</span>
                </div>
              </a>
            </li>
      <?php
      $data = array();
      $data = getMenuList(); 
      $MenuList = $data["MenuList"];
      $groups = $data["groups"];
      ?>
                @foreach($groups as $group)
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#{{$group->page_name}}-collapse" aria-expanded="false" aria-controls="gallery-collapse">
                  <span class="menu-title">{{$group->page_label}}</span>
                </a>
                <div class="collapse" id="{{$group->page_name}}-collapse">
                  <ul class="nav flex-column sub-menu">
                    @foreach($MenuList as $list)
                    @if($group->page_name == $list->main_group_name)
                    <li class="nav-item">
                       <a class="nav-link" href="{{route($list->page_name)}}">
                        {{$list->page_label}}
                      </a>
                    </li>
                    @endif
                    @endforeach
                  </ul>
                </div>
              </li>
              @endforeach
          </ul>
        </nav>
        @yield('content')

        {{-- Show data in mavigation --}}
                        
        {{-- End navigation data --}}
        {{-- Forms --}}
        
        {{-- end Form --}}
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{URL::to('/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{URL::to('/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject::js -->
    <script src="{{URL::to('/assets/js/off-canvas.js')}}"></script>
    <script src="{{URL::to('/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{URL::to('/assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{URL::to('/assets/js/dashboard.js')}} "></script>
    <script src="{{URL::to('/assets/js/todolist.js')}} "></script>
    <!-- Datatable -->
    <script>
      @yield('script')
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  </body>

</html>