<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="NGO Registration & Record Management System | Social Welfare Department KPK, Pakistan" name="description">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/avatar/KP-Logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/brand/favicon.icon') }}" />
    <title>NGO Registration Portal</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/formwizard/smart_wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/formwizard/smart_wizard_theme_arrows.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/formwizard/smart_wizard_theme_circles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/formwizard/smart_wizard_theme_dots.css') }}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css"> -->
    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!--Style css-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--Icons css-->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">

    <!--P-scrollbar css-->
    <link href="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.css') }}" rel="stylesheet" />

    <!--Sidemenu css-->
    <link rel="stylesheet" href="{{ asset('assets/css/sidemenu.css') }}">

    <!--Chartist css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/chartist/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/chartist/chartist-plugin-tooltip.css') }}">

    <!--Full calendar css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar/stylesheet1.css') }}">

    <!--morris css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
    <!--mutli css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/multi/multi.min.css') }}">
    <!--Select2 css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css') }}">

    <!--mutipleselect css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/multipleselect/multiple-select.css') }}">

    <!--Tempusdominus css-->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.css') }}">
    <!--Datatables css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/Datatable/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/Datatable/css/buttons.bootstrap4.min.css') }}">
</head>

<body class="app ">

    <!--Header Style -->
    <div class="wave -three"></div>

    <!--loader -->
    <div id="spinner"></div>

    <!--app open-->
    <div id="app" class="page">
        <div class="main-wrapper">

            <!--nav open-->
            <nav class="navbar navbar-expand-lg main-navbar">
  

 <div class="card-header bg-primary text-white">
                   
                    <span class="mr-3 mt-2 d-none d-lg-block ">
 
                                @if (session()->has('name'))
                                    {{ session('name') }}
                                @else
                                <h4 class="font-weight-bold">Welcome to Social Welfare Department</h4>
                                @endif
                            </span></span>
                    </span>
                </div>
		
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-2">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link toggle"><i
                                    class="fa fa-reorder"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link d-md-none navsearch"><i
                                    class="fa fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle d-none d-lg-block">
                        <a href="#" class="nav-link nav-link-lg full-screen-link">
                            <i class="fa fa-expand " id="fullscreen-button"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg d-flex">
                            <span>
                                <img src="{{ asset('assets/img/avatar/user_icon.jpg')}}" alt="profile-user"
                                     class="rounded-circle w-32 mr-2">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header noti-title text-center border-bottom pb-3">
                                <h5 class="text-capitalize text-dark mb-1">Social Welfare</h5>
                                <small class="text-overflow m-0">Govt. of KPK</small>
                            </div>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="side-menu__icon fe fe-log-out"></i> <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!--nav closed-->

            <!--aside open-->
            <aside class="app-sidebar">
                <div class="app-sidebar__user">
                    <div class="dropdown user-pro-body text-center">
                        <div class="nav-link pl-1 pr-1 leading-none ">
                            <img src="{{ asset('assets/img/avatar/KP-Logo.png')}}" alt="user-img"
                                class="avatar-xl rounded-circle mb-1">
                            <span class="pulse bg-success" aria-hidden="true"></span>
                        </div>
                        <div class="user-info">
                            <h6 class=" mb-1 text-dark">Social Welfare</h6>
                            <span class="text-muted app-sidebar__user-name text-sm">Govt. of KPK</span>
                        </div>
                    </div>
                </div>
                <ul class="side-menu">
                    @php
                        $role_id = session('role_id');
                    @endphp
                
                    {{-- Show only Summary for Role ID 1 & 3 --}}
                    @if($role_id == 2)
                        <li>
                            <a class="side-menu__item" href="{{ url('app_summary_district') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Applications</span>
                            </a>
                        </li>

                        <li>
                            <a class="side-menu__item" href="{{ url('do_forwarded_apps_list') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Forwarded Applications</span>
                            </a>
                        </li>
                    @endif

                    @if($role_id == 3)
                        <li>
                            <a class="side-menu__item" href="{{ url('app_summary_ad') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Applications</span>
                            </a>
                        </li>
                        <li>
                            <a class="side-menu__item" href="{{ url('ad_forwarded_apps_list') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Forwarded Applications</span>
                            </a>
                        </li>
                        <li>
                            <a class="side-menu__item" href="{{ url('ad_accepted_apps_list') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Accepted Applications</span>
                            </a>
                        </li>

                        <li>
                            <a class="side-menu__item" href="{{ url('ad_certificate_apps_list') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Certificates</span>
                            </a>
                        </li>
                    @endif

                    @if($role_id == 4)
                        <li>
                            <a class="side-menu__item" href="{{ url('app_summary_dd') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Applications</span>
                            </a>
                        </li>

                        <li>
                            <a class="side-menu__item" href="{{ url('dd_forwarded_apps_list') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Forwarded Applications</span>
                            </a>
                        </li>
                    @endif

                    @if($role_id == 5)
                    <li>
                        <a class="side-menu__item" href="{{ url('app_summary_directorate') }}">
                            <i class="side-menu__icon fe fe-grid"></i>
                            <span class="side-menu__label">Applications</span>
                        </a>
                    </li>
                    <li>
                            <a class="side-menu__item" href="{{ url('dg_accepted_apps_list') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Accepted Applications</span>
                            </a>
                        </li>

                        <li>
                            <a class="side-menu__item" href="{{ url('dg_rejected_apps_list') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Rejected Applications</span>
                            </a>
                        </li>

                        <li>
                            <a class="side-menu__item" href="{{ url('dg_certificate_apps_list') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Certificates</span>
                            </a>
                        </li>
                    @endif
                
                    {{-- Show only Settings & User Management for Admin (Role ID 2) --}}
                    @if($role_id == 1)
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="side-menu__icon fa fa-laptop"></i>
                                <span class="side-menu__label">Setting</span>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{ url('operation_area') }}">Area of Operation</a></li>
                                <li><a class="slide-item" href="{{ url('addbank') }}">Add Bank</a></li>
                                <li><a class="slide-item" href="{{ url('proposed') }}">Proposed Finances</a></li>
                                <li><a class="slide-item" href="{{ url('city') }}">Add City</a></li>
                                <li><a class="slide-item" href="{{ url('aim-objective') }}">Aim Objective</a></li>
                            </ul>
                        </li>
                
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="side-menu__icon fa fa-laptop"></i>
                                <span class="side-menu__label">User Management</span>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{ url('districts') }}">Add Districts</a></li>
                                <li><a class="slide-item" href="{{ url('roles') }}">Add Roles</a></li>
                                <li><a class="slide-item" href="{{ url('add-user') }}">Add User</a></li>
                            </ul>
                        </li>
                    @endif
                
                    {{-- Show other sections for non-admin & non-summary users --}}
                    @if(session()->has('id') && !in_array($role_id, [1, 2, 3,4,5]))
                        <li>
                            <a class="side-menu__item" href="{{ url('basic-information') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Basic Information</span>
                            </a>
                        </li>
                
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="side-menu__icon fa fa-laptop"></i>
                                <span class="side-menu__label">Member Form</span>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{ url('general-member')}}">General Body Member</a></li>
                                <li><a class="slide-item" href="{{ url('list-executive')}}">List Executive</a></li>
                                <li><a class="slide-item" href="{{ url('founding-body-member') }}">Founding Member</a></li>
                                <li><a class="slide-item" href="{{ url('membership') }}">Membership</a></li>
                            </ul>
                        </li>
                
                        <li>
                            <a class="side-menu__item" href="{{ url('financial-detail') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Financial Details</span>
                            </a>
                        </li>
                
                        <li>
                            <a class="side-menu__item" href="{{ url('operation') }}">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Operations</span>
                            </a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                            <i class="side-menu__icon fe fe-grid"></i>
                            <span class="side-menu__label">Applications</span>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{ url('summary') }}">Application List</a></li>
                                <li><a class="slide-item" href="{{ url('ngo_forwarded_apps') }}">Submitted Application</a></li>
                            </ul>
                        </li>

                    @endif
                </ul> 
            </aside>
            <!--aside closed-->

            <!--app-content open-->
            @yield('content')
            <!--app-content closed-->
        </div>

        <!--Footer-->
        <footer class="main-footer text-center">
        <a href="https://directorate_of_soci.kp.gov.pk/">Directorate Of Social Welfare, Special Education & Woman Empowwerment Department. Govt Of KPK</a>
        </footer>
        <!--/Footer-->
    </div>
    <!--app closed-->

    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
    <!--Jquery.min js-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!--popper js-->
    <script src="{{ asset('assets/js/popper.js') }}"></script>

    <!--Bootstrap.min js-->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!--Tooltip js-->
    <script src="{{ asset('assets/js/tooltip.js') }}"></script>

    <!-- Jquery star rating-->
    <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

    <!--Jquery.nicescroll.min js-->
    <script src="{{ asset('assets/plugins/nicescroll/jquery.nicescroll.min.js') }}"></script>

    <!--Scroll-up-bar.min js-->
    <script src="{{ asset('assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>

    <!--Sidemenu js-->
    <script src="{{ asset('assets/plugins/toggle-menu/sidemenu.js') }}"></script>

    <!--p-scrollbar js-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/p-scroll.js') }}"></script>

    <!-- jQuery Sparklines -->
    <script src="{{ asset('assets/plugins/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>

    <!--Jquery.knob js-->
    <script src="{{ asset('assets/plugins/othercharts/jquery.knob.js') }}"></script>

    <!--Jquery.sparkline js-->
    <script src="{{ asset('assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

    <!--Chart js-->
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>

    <!--Dashboard js-->
    <script src="{{ asset('assets/js/dashboard4.js') }}"></script>

    <!--Other Charts js-->
    <script src="{{ asset('assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/othercharts.js') }}"></script>

    <!--Sparkline js-->
    <script src="{{ asset('assets/js/sparkline.js') }}"></script>

    <!--Showmore js-->
    <script src="{{ asset('assets/js/jquery.showmore.js') }}"></script>

    <!--Scripts js-->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <!--multi js-->
    <script src="{{ asset('assets/plugins/multi/multi.min.js') }}"></script>
    <script src="{{ asset('assets/js/formelementadvnced.js') }}"></script>

    <!--Select2 js-->
    <script src="{{ asset('assets/plugins/select2/select2.full.js') }}"></script>
    <!--MutipleSelect js-->
    <script src="{{ asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/multipleselect/multi-select.js') }}"></script>

    <!--Accordion-Wizard-Form js-->
    <script src="{{ asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js') }}"></script>

    <!--Tempusdominus js-->
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>

    <!--DataTables js-->
    <script src="{{ asset('assets/plugins/Datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/Datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/plugins/Datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/Datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/Datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/Datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/Datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/Datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/Datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/Datatable/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('assets/js/datatable.js') }}"></script>
    <!--Advanced Froms -->
    <script src="{{ asset('assets/js/advancedform.js') }}"></script>
    <script src="{{ asset('assets/js/forms.js') }}"></script>

    <!-- JavaScript Files -->

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script> -->
    <script src="{{ asset('assets/plugins/formwizard/jquery.smartWizard.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#smartwizard').smartWizard({
                theme: 'arrows', // Choose theme: 'default', 'arrows', 'circles', 'dots'
                transitionEffect: 'fade', // Transition effects: 'slide', 'fade', etc.
                showStepURLhash: false, // Disable URL hash updates
                toolbarSettings: {
                    showNextButton: true, // Show Next button
                    showPreviousButton: true, // Show Previous button
                }
            });
        });
    </script>
</body>
</html>
