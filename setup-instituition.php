<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Institution SetUp </title>
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
        <!--page level css -->
        <link href="vendors/jasny-bootstrap/css/jasny-bootstrap.css" type="text/css" rel="stylesheet">
        <link href="vendors/select2/css/select2.min.css" type="text/css" rel="stylesheet">
        <link href="vendors/select2/css/select2-bootstrap.css" type="text/css" rel="stylesheet">
        <link href="vendors/bootstrapvalidator/css/bootstrapValidator.min.css" type="text/css" rel="stylesheet">
        <link href="vendors/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="vendors/iCheck/css/all.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link rel="stylesheet" href="css/custom_css/skins/skin-default.css" type="text/css" id="skin"/>
        <link href="css/custom_css/wizard.css" type="text/css" rel="stylesheet">
        <!--end of page level css -->
        <link href="vendors/hover/css/hover-min.css" rel="stylesheet">
        <link rel="stylesheet" href="vendors/laddabootstrap/css/ladda-themeless.min.css">
        <link href="css/buttons_sass.css" rel="stylesheet">
        <link href="css/advbuttons.css" rel="stylesheet">
        <link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css">
        <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="vendors/animate/animate.min.css">
        <link rel="stylesheet" type="text/css" href="css/custom_css/advanced_modals.css">
    </head>

    <body class="skin-default">
        <div class="preloader">
            <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
        </div>
        <!-- header logo: style can 
        be found in header-->
        <?php
        require_once 'header.php';
        ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            require_once 'sidebar.php';
            ?>

            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Institution SetUp
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">
                                <i class="fa fa-fw ti-home"></i> Configuration
                            </a>
                        </li>
                        <li>
                            <a href="#"> Institution</a>
                        </li>
                        <li class="active">
                            SetUp Institution
                        </li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff"
                                           data-loop="true"></i>  New Institution
                                    </h3>
                                    <span class="right_aligned">
                                        <i class="fa fa-fw ti-angle-up clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label for="input-text" class="col-sm-2 control-label"> Code</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-text"
                                                       >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-sm-2 control-label">Institution Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-sm-2 control-label">Date Of Establishment</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-sm-2 control-label">Region</label>
                                            <div class="col-sm-10">
                                                <select id="select21" class="form-control select2" style="width:100%">
                                                    <option value="">Select value...</option>



                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="inputPassword" class="col-sm-2 control-label">District</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-sm-2 control-label">Location</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-sm-2 control-label">Latitude</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-sm-2 control-label">Longitude</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-sm-2 control-label">Principal No</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" readonly />
                                            </div>
                                            <div class="col-sm-2">

                                                <!--                                                <button class="button button-rounded button-caution-flat hvr-float" data-toggle="modal" data-target="#form_modal">
                                                                                                    Add 
                                                                                                </button>-->
                                                <button type="button" class="button button-rounded button-caution-flat " data-toggle="modal" data-target="#form_modal">
                                                    Add
                                                </button>
                                            </div>
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-info" >
                                                    SUbmit
                                                </button>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="form_modal" class="modal fade animated" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Principal Information</h4>
                                </div>
                                <form role="form">
                                    <div class="modal-body">
                                        <div class="row m-t-10">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="sr-only" for="first-name">First-Name</label>
                                                    <input type="text" name="first-name" id="first-name"
                                                           placeholder="First Name" class="form-control m-t-10">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <label class="sr-only" for="last-name">Last-Name</label>
                                                    <input type="text" name="last-name" id="last-name"
                                                           placeholder="Last Name" class="form-control m-t-10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="sr-only" for="message">Message</label>
                                                    <textarea class="form-control resize_vertical m-t-10"
                                                              name="message"
                                                              placeholder="Message" rows="6"
                                                              id="message"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-succes">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="background-overlay"></div>
                </section>
            </aside>
        </div>
        <!--wrapper ends-->
        <!-- global js -->
        <script src="js/app.js" type="text/javascript"></script>
        <!-- end of global js -->
        <!-- begining of page level js -->
        <script src="vendors/moment/js/moment.min.js"></script>
        <script src="vendors/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript"></script>
        <script src="vendors/select2/js/select2.js" type="text/javascript"></script>
        <script src="vendors/bootstrapwizard/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
        <script src="vendors/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
        <script src="vendors/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="vendors/iCheck/js/icheck.js"></script><script src="vendors/select2/js/select2.js" type="text/javascript"></script>
        <script src="vendors/select2/js/select2.js" type="text/javascript"></script>
        <script src="js/custom_js/adduser.js" type="text/javascript"></script>
        <!-- end of page level js -->
        <script type="text/javascript" src="vendors/Buttons/js/buttons.js"></script>
        <script type="text/javascript" src="vendors/laddabootstrap/js/spin.min.js"></script>
        <script type="text/javascript" src="vendors/laddabootstrap/js/ladda.min.js"></script>
        <script type="text/javascript" src="js/custom_js/button_main.js"></script>
        <script type="text/javascript" src="js/custom_js/advanced_modals.js"></script>
    </body>

</html>
