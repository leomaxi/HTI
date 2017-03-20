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
        <?php
        require_once './header.php';
        ?>
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