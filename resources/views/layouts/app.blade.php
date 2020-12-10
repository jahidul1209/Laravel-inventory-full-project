<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

    <!-- Base Css Files -->
        <link href="{{ asset('public/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{ asset('public/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
        <link href="{{ asset('public/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('public/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{ asset('public/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{ asset('public/css/waves-effect.css')}}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{ asset('public/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/css/style.css')}}" rel="stylesheet" type="text/css" />
                <!-- DataTables -->
        <link href="{{asset('public/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

        <script src="{{ asset('public/js/modernizr.min.js')}}"></script>
</head>
                @php 
                date_default_timezone_set("Asia/Dhaka");
                @endphp
<body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">

                     @guest

                      @else
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="md md-terrain"></i> <span>Md.Pavel </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                       <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                       <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                       <small>There are
                                                          <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{URL :: to ('public/images/avatar-1.jpg')}}" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i>      Logout</a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                    </form>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{URL::to('public/images/users/avatar-1.jpg')}}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Md.Pavel </a>
                            </div>
                            
                            <p class="text-muted m-0">Web Developer</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{route('home')}}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>
                             <li>
                                <a href="{{route('pos')}}" class="waves-effect"><i class=" md-account-balance"></i><span> POS </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="{{route('all-employee')}}" class="waves-effect"><i class=" md-group"></i><span> Employee </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="{{route('add-employee')}}">Add Employee</a></li>
                                      <li><a href="{{route('all-employee')}}">All Employee</a></li>
                                </ul>
                            </li>
                             <li class="has_sub">
                                <a href="{{route('all-customer')}}" class="waves-effect"><i class="  md-shopping-cart"></i><span> Customer </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="{{route('add-customer')}}">Add Customer</a></li>
                                      <li><a href="{{route('all-customer')}}">All Customer</a></li>
                                </ul>
                            </li>

                             <li class="has_sub">
                                <a href="{{route('all-supplier')}}" class="waves-effect"><i class=" md-directions-bike"></i><span> Supplier </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="{{route('add-supplier')}}">Add Supplier</a></li>
                                      <li><a href="{{route('all-supplier')}}">All Supplier</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="{{route('all-advanced-salary')}}" class="waves-effect"><i class=" md-equalizer"></i><span> Employee Salary  </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="{{route('add-advanced-salary')}}">Add Advanced Salary</a></li>
                                      <li><a href="{{route('all-advanced-salary')}}">All Advanced Salary</a></li>
                                      <li><a href="{{route('pay-salary')}}">Pay Salary</a></li>
                                      <li><a href="{{route('last-month-salary')}}">Last Month Salary</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="{{route('all-category')}}" class="waves-effect"><i class="  md-face-unlock"></i><span> Product Category  </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="{{route('add-category')}}">Add Category</a></li>
                                      <li><a href="{{route('all-category')}}">All Category</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="{{route('all-category')}}" class="waves-effect"><i class="  md md-palette"></i><span> Products </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="{{route('add-product')}}">Add Product</a></li>
                                      <li><a href="{{route('all-product')}}">All Product</a></li>
                                       <li><a href="{{route('import-product')}}">Import Product</a></li>
                                </ul>
                            </li>
                             <li class="has_sub">
                                <a href="{{route('today-expence')}}" class="waves-effect"><i class="  md md-redeem"></i><span> Expence </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="{{route('add-expence')}}">Add Expence</a></li>
                                    <li><a href="{{route('today-expence')}}">Today Expence</a></li>
                                    <li><a href="{{route('monthly-expence')}}">Monthly Expence</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="  md  md-store"></i><span> Orders </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="{{route('pending-order')}}">Pending Orders</a></li>
                                     <li><a href="{{route('success-order')}}">Success Orders</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="  md  md-store"></i><span> Sales Report </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="#">Report-1</a></li>
                                    <li><a href="#">Report-2</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="{{route('home')}}" class="waves-effect"><i class="  md   md-quick-contacts-mail"></i><span> Attendence</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="{{route('add-attendence')}}">Add Attendence</a></li>
                                    <li><a href="{{route('all-attendence')}}">All Attendence</a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 

                        @endguest


        <main class="py-4">
            @yield('content')
        </main>

            <footer class="footer text-center">
                    2020 © Md.Pavel.
            </footer>
    </div>
        <!-- END wrapper -->

    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('public/js/jquery.min.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="{{ asset('public/js/waves.js')}}"></script>
        <script src="{{ asset('public/js/wow.min.js')}}"></script>
        <script src="{{ asset('public/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{ asset('public/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{ asset('public/assets/chat/moment-2.2.1.js')}}"></script>
        <script src="{{ asset('public/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{ asset('public/assets/jquery-detectmobile/detect.js')}}"></script>
        <script src="{{ asset('public/assets/fastclick/fastclick.js')}}"></script>
        <script src="{{ asset('public/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('public/assets/jquery-blockui/jquery.blockUI.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>



 <script src="{{ asset('public/js/bootstrap.min.js')}}"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
         <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
        <!-- sweet alerts -->
        <script src="{{ asset('public/assets/sweet-alert/sweet-alert.min.js')}}"></script>
        <script src="{{ asset('public/assets/sweet-alert/sweet-alert.init.js')}}"></script>

        <!-- flot Chart -->
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.js')}}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.time.js')}}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.pie.js')}}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.selection.js')}}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.stack.js')}}"></script>
        <script src="{{ asset('public/assets/flot-chart/jquery.flot.crosshair.js')}}"></script>

        <!-- Counter-up -->
        <script src="{{ asset('public/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('public/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>

      <script src="{{asset('public/assets/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('public/assets/datatables/dataTables.bootstrap.js')}}"></script>


        
        <!-- CUSTOM JS -->
        <script src="{{ asset('public/js/jquery.app.js')}}"></script>

        <!-- Dashboard -->
        <script src="{{ asset('public/js/jquery.dashboard.js')}}"></script>

        <!-- Chat -->
        <script src="{{ asset('public/js/jquery.chat.js')}}"></script>

        <!-- Todo -->
        <script src="{{ asset('public/js/jquery.todo.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
        <script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
<script>
    $(document).on("click","#delete" , function(e){
        e.preventDefault();
        var link= $(this).attr("href");
            swal({
              title: "Are you Want To Delete?",
              text: "One Delete ,This will be Permanently Delete!",
              icon: "warning",
              buttons: true,
              dengerMode :true,
            })
          .then((willdelete) =>{
            if(willdelete){
                window.location.href =link;
            }else{
                swal("Safe Date");
            }
          });
        });

</script>
<script type="text/javascript">
    function readURL(input){
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload= function(e){
                $('#image')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</body>
</html>
