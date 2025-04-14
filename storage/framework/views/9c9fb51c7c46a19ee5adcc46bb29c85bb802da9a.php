<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Splite - a responsive, flat and full featured admin template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords"
        content="bootstrap admin template,bootstrap dashboard,dashboard template,bootstrap dashboard,admin dashboard,bootstrap admin,html admin template,html dashboard template,bootstrap admin dashboard,themeforest admin template,admin panel template,bootstrap 4 admin template,template admin bootstrap 4,bootstrap dashboard template,dashboard design template">
    <link rel="icon" href="<?php echo e(asset('assets/img/brand/favicon.icon')); ?>" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/brand/favicon.icon')); ?>" />
    <title>Laravel Admin</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/formwizard/smart_wizard.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/formwizard/smart_wizard_theme_arrows.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/formwizard/smart_wizard_theme_circles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/formwizard/smart_wizard_theme_dots.css')); ?>">
    
    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>">

    <!--Style css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">

    <!--Icons css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/icons.css')); ?>">

    <!--P-scrollbar css-->
    <link href="<?php echo e(asset('assets/plugins/p-scroll/perfect-scrollbar.css')); ?>" rel="stylesheet" />

    <!--Sidemenu css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/sidemenu.css')); ?>">

    <!--Chartist css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/chartist/chartist.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/chartist/chartist-plugin-tooltip.css')); ?>">

    <!--Full calendar css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fullcalendar/stylesheet1.css')); ?>">

    <!--morris css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/morris/morris.css')); ?>">
    <!--mutli css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/multi/multi.min.css')); ?>">
    <!--Select2 css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/select2.css')); ?>">

    <!--mutipleselect css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/multipleselect/multiple-select.css')); ?>">

    <!--Tempusdominus css-->
    <link rel="stylesheet"
        href="<?php echo e(asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.css')); ?>">
    <!--Datatables css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/Datatable/css/dataTables.bootstrap4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/Datatable/css/buttons.bootstrap4.min.css')); ?>">
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
 
                                <?php if(session()->has('name')): ?>
                                    <?php echo e(session('name')); ?>

                                <?php else: ?>
                                <h4 class="font-weight-bold">Welcome to Social Welfare Department</h4>
                         
                                <?php endif; ?>
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
                    <div class="search-element mr-3">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <span class="Search-icon"><i class="fa fa-search"></i></span>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle d-none d-lg-block "><a href="#"
                            data-toggle="dropdown" class="nav-link  nav-link-lg "><i class=" fa fa-flag-o "></i></a>
                        <div class="dropdown-menu dropdown-menu-lg  dropdown-menu-right">
                            <a href="#" class="dropdown-item d-flex align-items-center">
                                <img src="<?php echo e(asset('assets/img/flags/french_flag.jpg')); ?>" alt="flag-img"
                                    class=" flag-sm mr-3 align-self-center">
                                <div>
                                    <strong>French</strong>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex align-items-center">
                                <img src="<?php echo e(asset('assets/img/flags/germany_flag.jpg')); ?>" alt="flag-img"
                                    class=" flag-sm mr-3 align-self-center">
                                <div>
                                    <strong>Germany</strong>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex align-items-center">
                                <img src="<?php echo e(asset('assets/img/flags/italy_flag.jpg')); ?>" alt="flag-img"
                                    class=" flag-sm  mr-3 align-self-center">
                                <div>
                                    <strong>Italy</strong>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex align-items-center">
                                <img src="<?php echo e(asset('assets/img/flags/russia_flag.jpg')); ?>" alt="flag-img"
                                    class=" flag-sm mr-3 align-self-center">
                                <div>
                                    <strong>Russia</strong>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex align-items-center">
                                <img src="<?php echo e(asset('assets/img/flags/spain_flag.jpg')); ?>" alt="flag-img"
                                    class=" flag-sm mr-3 align-self-center">
                                <div>
                                    <strong>Spain</strong>
                                </div>
                            </a>
                        </div>
                    </li>
                  
                    <li class="dropdown dropdown-list-toggle d-none d-lg-block">
                        <a href="#" class="nav-link nav-link-lg full-screen-link">
                            <i class="fa fa-expand " id="fullscreen-button"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg d-flex">
                            <span>
                                <img src="<?php echo e(asset('assets/img/avatar/avatar-3.jpeg')); ?>" alt="profile-user"
                                     class="rounded-circle w-32 mr-2">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header noti-title text-center border-bottom pb-3">
                                <h5 class="text-capitalize text-dark mb-1">Govt. of KPK</h5>
                                <small class="text-overflow m-0">Web Designer</small>
                            </div>
                            <a class="dropdown-item" href=""><i class="mdi mdi-account-outline mr-2"></i>
                                <span>My Profile</span></a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-settings mr-2"></i>
                                <span>Settings</span></a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-message-outline mr-2"></i>
                                <span>Mails</span></a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-account-multiple-outline mr-2"></i>
                                <span>Friends</span></a>
                            <a class="dropdown-item" href="#"><i class="fe fe-calendar mr-2"></i>
                                <span>Activity</span></a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-compass-outline mr-2"></i>
                                <span>Support</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">
                                <i class="mdi mdi-logout-variant mr-2"></i> <span>Logout</span>
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
                            <img src="<?php echo e(asset('assets/img/avatar/avatar-3.jpeg')); ?>" alt="user-img"
                                class="avatar-xl rounded-circle mb-1">
                            <span class="pulse bg-success" aria-hidden="true"></span>
                        </div>
                        <div class="user-info">
                            <h6 class=" mb-1 text-dark">Social Welfare</h6>
                            <span class="text-muted app-sidebar__user-name text-sm"> Web-Designer</span>
                        </div>
                    </div>
                </div>
                <ul class="side-menu">
                    <?php
                        $role_id = session('role_id');
                    ?>
                
                    
                    <?php if($role_id == 2): ?>
                        <li>
                            <a class="side-menu__item" href="<?php echo e(url('app_summary_district')); ?>">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Applications</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if($role_id == 3): ?>
                    <li>
                        <a class="side-menu__item" href="<?php echo e(url('app_summary_directorate')); ?>">
                            <i class="side-menu__icon fe fe-grid"></i>
                            <span class="side-menu__label">Applications</span>
                        </a>
                    </li>
                <?php endif; ?>
                
                    
                    <?php if($role_id == 1): ?>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="side-menu__icon fa fa-laptop"></i>
                                <span class="side-menu__label">Setting</span>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo e(url('operation_area')); ?>">Area Of Operation</a></li>
                                <li><a class="slide-item" href="<?php echo e(url('addbank')); ?>">Add Bank</a></li>
                                <li><a class="slide-item" href="<?php echo e(url('proposed')); ?>">Proposed Finances</a></li>
                                <li><a class="slide-item" href="<?php echo e(url('city')); ?>">Add City</a></li>
                                <li><a class="slide-item" href="<?php echo e(url('aim-objective')); ?>">Aim Objective</a></li>
                            </ul>
                        </li>
                
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="side-menu__icon fa fa-laptop"></i>
                                <span class="side-menu__label">User Management</span>
                            </a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo e(url('roles')); ?>">Add Roles</a></li>
                                <li><a class="slide-item" href="<?php echo e(url('add-user')); ?>">Add User</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                
                    
                    <?php if(session()->has('id') && !in_array($role_id, [1, 2, 3])): ?>
                        <li>
                            <a class="side-menu__item" href="<?php echo e(url('basic-information')); ?>">
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
                                <li><a class="slide-item" href="<?php echo e(url('general-member')); ?>">General Body Member</a></li>
                                <li><a class="slide-item" href="<?php echo e(url('list-executive')); ?>">List Executive</a></li>
                                <li><a class="slide-item" href="<?php echo e(url('founding-body-member')); ?>">Founding Member</a></li>
                                <li><a class="slide-item" href="<?php echo e(url('membership')); ?>">Membership</a></li>
                            </ul>
                        </li>
                
                        <li>
                            <a class="side-menu__item" href="<?php echo e(url('financial-detail')); ?>">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Financial Detail Member</span>
                            </a>
                        </li>
                
                        <li>
                            <a class="side-menu__item" href="<?php echo e(url('operation')); ?>">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Operations</span>
                            </a>
                        </li>
                        <li>
                            <a class="side-menu__item" href="<?php echo e(url('summary')); ?>">
                                <i class="side-menu__icon fe fe-grid"></i>
                                <span class="side-menu__label">Summary</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                
                
                
                
            </aside>
            <!--aside closed-->

            <!--app-content open-->
            <?php echo $__env->yieldContent('content'); ?>
            <!--app-content closed-->

            <!-- Popupchat open-->
            <div class="popup-box chat-popup" id="qnimate">
                <div class="popup-head">
                    <div class="popup-head-left pull-left"><img src="<?php echo e(asset('assets/img/avatar/avatar-3.jpeg')); ?>"
                            alt="iamgurdeeposahan" class="mr-2"> Alica Nestle</div>
                    <div class="popup-head-right pull-right">
                        <div class="btn-group">
                            <button class="chat-header-button" data-toggle="dropdown" type="button"
                                aria-expanded="false">
                                <i class="glyphicon glyphicon-cog"></i> </button>
                            <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                <li><a href="#">Media</a></li>
                                <li><a href="#">Block</a></li>
                                <li><a href="#">Clear Chat</a></li>
                                <li><a href="#">Email Chat</a></li>
                            </ul>
                        </div>
                        <button data-widget="remove" id="removeClass" class="chat-header-button pull-right"
                            type="button"><i class="glyphicon glyphicon-off"></i></button>
                    </div>
                </div>
                <div class="popup-messages">
                    <div class="direct-chat-messages">
                        <div class="chat-box-single-line">
                            <abbr class="timestamp">December 15th, 2018</abbr>
                        </div>
                        <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name float-left">Alica Nestle</span>
                                <span class="direct-chat-timestamp float-right">7:40 Am</span>
                            </div>
                            <img class="direct-chat-img" src="<?php echo e(asset('assets/img/avatar/avatar-3.jpeg')); ?>"
                                alt="message user image">
                            <div class="direct-chat-text">
                                Hello. How are you today?
                            </div>
                        </div>
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name float-right">Roberts</span>
                                <span class="direct-chat-timestamp float-left">8:05 Am</span>
                            </div>
                            <img class="direct-chat-img" src="<?php echo e(asset('assets/img/avatar/avatar-2.jpeg')); ?>"
                                alt="message user image">
                            <div class="direct-chat-text">
                                I'm fine. Thanks for asking!
                            </div>
                        </div>
                        <div class="chat-box-single-line  mb-3">
                            <abbr class="timestamp">December 14th, 2018</abbr>
                        </div>
                        <div class="direct-chat-msg doted-border">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name float-left">Alica Nestle</span>
                                <span class="direct-chat-timestamp float-right">6:20 Am</span>
                            </div>
                            <img alt="iamgurdeeposahan" src="<?php echo e(asset('assets/img/avatar/avatar-3.jpeg')); ?>"
                                class="direct-chat-img"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                Hey bro, how’s everything going ?
                            </div>
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name float-right">Roberts</span>
                                    <span class="direct-chat-timestamp float-left">7:05 Am</span>
                                </div>
                                <img class="direct-chat-img" src="<?php echo e(asset('assets/img/avatar/avatar-2.jpeg')); ?>"
                                    alt="message user image">
                                <div class="direct-chat-text">
                                    Nothing Much!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popup-messages-footer">
                    <textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
                    <div class="btn-footer">
                        <button class="bg_none"><i class="glyphicon glyphicon-film"></i> </button>
                        <button class="bg_none"><i class="glyphicon glyphicon-camera"></i> </button>
                        <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>
                        <button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i> </button>
                    </div>
                </div>
            </div>
            <!-- Popupchat closed -->

        </div>

        <!--Footer-->
        <footer class="main-footer">
        <div class="text-center"><a href="https://directorate_of_soci.kp.gov.pk/">Directorate Of Social Welfare, Special Education & Woman Empowwerment Department. Govt Of KPK</a></div>
        </footer>
        <!--/Footer-->
    </div>
    <!--app closed-->

    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- Popup-chat -->
    <a href="#" id="addClass"><i class="ti-comment"></i></a>

    <!--Jquery.min js-->
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>

    <!--popper js-->
    <script src="<?php echo e(asset('assets/js/popper.js')); ?>"></script>

    <!--Bootstrap.min js-->
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>

    <!--Tooltip js-->
    <script src="<?php echo e(asset('assets/js/tooltip.js')); ?>"></script>

    <!-- Jquery star rating-->
    <script src="<?php echo e(asset('assets/plugins/rating/jquery.rating-stars.js')); ?>"></script>

    <!--Jquery.nicescroll.min js-->
    <script src="<?php echo e(asset('assets/plugins/nicescroll/jquery.nicescroll.min.js')); ?>"></script>

    <!--Scroll-up-bar.min js-->
    <script src="<?php echo e(asset('assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js')); ?>"></script>

    <!--Sidemenu js-->
    <script src="<?php echo e(asset('assets/plugins/toggle-menu/sidemenu.js')); ?>"></script>

    <!--p-scrollbar js-->
    <script src="<?php echo e(asset('assets/plugins/p-scroll/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/p-scroll/p-scroll.js')); ?>"></script>

    <!-- jQuery Sparklines -->
    <script src="<?php echo e(asset('assets/plugins/jquery-sparkline/dist/jquery.sparkline.js')); ?>"></script>

    <!--Jquery.knob js-->
    <script src="<?php echo e(asset('assets/plugins/othercharts/jquery.knob.js')); ?>"></script>

    <!--Jquery.sparkline js-->
    <script src="<?php echo e(asset('assets/plugins/othercharts/jquery.sparkline.min.js')); ?>"></script>

    <!--Chart js-->
    <script src="<?php echo e(asset('assets/js/chart.min.js')); ?>"></script>

    <!--Dashboard js-->
    <script src="<?php echo e(asset('assets/js/dashboard4.js')); ?>"></script>

    <!--Other Charts js-->
    <script src="<?php echo e(asset('assets/plugins/othercharts/jquery.sparkline.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/othercharts.js')); ?>"></script>

    <!--Sparkline js-->
    <script src="<?php echo e(asset('assets/js/sparkline.js')); ?>"></script>

    <!--Showmore js-->
    <script src="<?php echo e(asset('assets/js/jquery.showmore.js')); ?>"></script>

    <!--Scripts js-->
    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>

    <!--multi js-->
    <script src="<?php echo e(asset('assets/plugins/multi/multi.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/formelementadvnced.js')); ?>"></script>

    <!--Select2 js-->
    <script src="<?php echo e(asset('assets/plugins/select2/select2.full.js')); ?>"></script>
    <!--MutipleSelect js-->
    <script src="<?php echo e(asset('assets/plugins/multipleselect/multiple-select.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/multipleselect/multi-select.js')); ?>"></script>

    <!--Accordion-Wizard-Form js-->
    <script src="<?php echo e(asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js')); ?>"></script>

    <!--Tempusdominus js-->
    <script src="<?php echo e(asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js')); ?>"></script>

    <!--DataTables js-->
    <script src="<?php echo e(asset('assets/plugins/Datatable/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/Datatable/js/dataTables.bootstrap4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/Datatable/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/Datatable/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/Datatable/js/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/Datatable/js/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/Datatable/js/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/Datatable/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/Datatable/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/Datatable/js/buttons.colVis.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/datatable.js')); ?>"></script>
    <!--Advanced Froms -->
    <script src="<?php echo e(asset('assets/js/advancedform.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/forms.js')); ?>"></script>

    <!-- JavaScript Files -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('assets/plugins/formwizard/jquery.smartWizard.min.js')); ?>"></script>
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
<?php /**PATH D:\xampp\htdocs\durshal_cfp\ngo\resources\views/layout.blade.php ENDPATH**/ ?>