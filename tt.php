<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Institution SetUp</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- global css -->
        <link type="text/css" href="css/app.css" rel="stylesheet"/>
        <!-- end of global css -->
        <!-- page level css -->
        <link href="vendors/iCheck/css/all.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="vendors/gridforms/css/gridforms.css"/>
        <link rel="stylesheet" type="text/css" href="vendors/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="vendors/select2/css/select2.min.css">
        <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
        <link href="vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/custom.css"/>
        <link rel="stylesheet" href="css/custom_css/skins/skin-default.css" type="text/css" id="skin"/>
        <link rel="stylesheet" type="text/css" href="css/custom_css/complex_forms2.css"/>
        <!-- end of page level css -->
    </head>

    <body class="skin-default">
        <div class="preloader">
            <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
        </div>
        <!-- header logo: style can be found in header-->
       <header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="index.html" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="img/logo.png" alt="logo"/>
        </a>
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw ti-menu"></i>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-fw ti-email black"></i>
                        <span class="label label-success">2</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages table-striped">
                        <li class="dropdown-title">New Messages</li>
                        <li>
                            <a href="" class="message striped-col">
                                <img class="message-image img-circle" src="img/authors/avatar7.jpg" alt="avatar-image">

                                <div class="message-body"><strong>Ernest Kerry</strong>
                                    <br>
                                    Can we Meet?
                                    <br>
                                    <small>Just Now</small>
                                    <span class="label label-success label-mini msg-lable">New</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message">
                                <img class="message-image img-circle" src="img/authors/avatar6.jpg" alt="avatar-image">

                                <div class="message-body"><strong>John</strong>
                                    <br>
                                    Dont forgot to call...
                                    <br>
                                    <small>5 minutes ago</small>
                                    <span class="label label-success label-mini msg-lable">New</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message striped-col">
                                <img class="message-image img-circle" src="img/authors/avatar5.jpg" alt="avatar-image">

                                <div class="message-body">
                                    <strong>Wilton Zeph</strong>
                                    <br>
                                    If there is anything else &hellip;
                                    <br>
                                    <small>14/10/2014 1:31 pm</small>
                                </div>

                            </a>
                        </li>
                        <li>
                            <a href="" class="message">
                                <img class="message-image img-circle" src="img/authors/avatar1.jpg" alt="avatar-image">
                                <div class="message-body">
                                    <strong>Jenny Kerry</strong>
                                    <br>
                                    Let me know when you free
                                    <br>
                                    <small>5 days ago</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message striped-col">
                                <img class="message-image img-circle" src="img/authors/avatar.jpg" alt="avatar-image">
                                <div class="message-body">
                                    <strong>Tony</strong>
                                    <br>
                                    Let me know when you free
                                    <br>
                                    <small>5 days ago</small>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer"><a href="#">View All messages</a></li>
                    </ul>

                </li>
                <!--rightside toggle-->
                <li>
                    <a href="#" class="dropdown-toggle toggle-right">
                        <i class="fa fa-fw ti-view-list black"></i>
                        <span class="label label-danger">9</span>
                    </a>
                </li>
                <!-- User Account: style can be found in dropdown-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                        <img src="img/authors/avatar1.jpg" width="35" class="img-circle img-responsive pull-left"
                             height="35" alt="User Image">
                        <div class="riot">
                            <div>
                                Addison
                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="img/authors/avatar1.jpg" class="img-circle" alt="User Image">
                            <p> Addison</p>
                        </li>
                        <!-- Menu Body -->
                        <li class="p-t-3">
                            <a href="user_profile.html">
                                <i class="fa fa-fw ti-user"></i> My Profile
                            </a>
                        </li>
                        <li role="presentation"></li>
                        <li>
                            <a href="edit_user.html">
                                <i class="fa fa-fw ti-settings"></i> Account Settings
                            </a>
                        </li>
                        <li role="presentation" class="divider"></li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="lockscreen.html">
                                    <i class="fa fa-fw ti-lock"></i>
                                    Lock
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="login.html">
                                    <i class="fa fa-fw ti-shift-right"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php
            require_once './sidebar.php';
            ?>
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <!--section starts-->
                    <h1>
                        Institution SetUp
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">
                                <i class="fa fa-fw ti-home"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#">Institution</a>
                        </li>
                        <li class="active">
                            Institution Setup
                        </li>
                    </ol>
                </section>
                <!--section ends-->
                <section class="content">
                    <div class="row" id="complex-form2">
                        <div class="col-lg-12">
                            <form class="grid-form form-horizontal">
                                <div class="text-center">
                                    <h3>Institution SetUp</h3>
                                </div>
                                <fieldset>
                                    <legend>(A)Institution Basic Information</legend>
                                    <div data-row-span="4">
                                        <div data-field-span="2">
                                            <label> Name:</label>
                                            <input class="form-control" id="institution_name" name="institution_name" type="text">
                                            <label for="pan_appl2">Date Of Establishment</label>
                                            <div class='input-group date'>
                                                <input type='text' id="dob_appl1" class="form-control"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                            <label for="pan_appl3">Location</label>
                                            <input class="form-control" id="pan_appl3" type="text">
                                            <label for="maiden_name3">Principal No</label>
                                            <input class="form-control" id="principalno" type="text" disabled>
                                            <button type="button" class="btn btn-info btn-block" data-toggle="modal"
                                                    data-target="#basic_modal" data-animate-modal="lightSpeedIn">
                                                Add Principal
                                            </button>
                                        </div>
                                        <div data-field-span="2">
                                            <label for="maiden_name1">Region</label>
                                            <select id="select_country">
                                            </select>
                                            <label for="maiden_name2">District</label>
                                            <input class="form-control" id="district" type="text">
                                            <label for="maiden_name3">Longitude</label>
                                            <input class="form-control" id="longitude" type="text">
                                            <label for="maiden_name3">Latitude</label>
                                            <input class="form-control" id="longitude" type="text">
                                        </div>
                                    </div>
                                </fieldset>
                                <br><br>
                                <div class="pull-right">
                                    <button type="button" class="btn btn-succes" >Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- End of Animation buttons -->
                <div id="basic_modal" class="modal fade animated" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close"
                                        data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Principal Header</h4>
                            </div>
                            <div class="modal-body">
                                <p>This is Principal Information</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.content -->
            </aside>
            <!-- /.right-side -->
        </div>
        <!-- ./wrapper -->
        <!-- global js -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <script src="https://cdn.jsdelivr.net/g/bootstrap@3.3.7,bootstrap.switch@3.3.2,jquery.nicescroll@3.6.0"></script> <script src="js/app.js" type="text/javascript"></script><!-- end of global js-->
        <!-- page level js-->
        <script src="vendors/iCheck/js/icheck.js" type="text/javascript"></script>
        <script src="vendors/datedropper/datedropper.js" type="text/javascript"></script>
        <script type="text/javascript" src="vendors/moment/js/moment.min.js"></script>
        <script type="text/javascript" src="vendors/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="vendors/select2/js/select2.js"></script>
        <script src="vendors/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript"></script>
        <script src="js/custom_js/complex_form2.js" type="text/javascript"></script>
        <!-- end of page level js-->
    </body>

</html>

<!-- Localized -->