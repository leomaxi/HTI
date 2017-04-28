<?php
session_start();
if ($_SESSION['login_valid'] != "YES") {
    ?>
    <script type="text/javascript">
        window.location = 'index.php';
    </script>
    <?php
}
?><!DOCTYPE html>
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
        <link rel="stylesheet" href="vendors/datetime/css/jquery.datetimepicker.css">
        <link href="vendors/airdatepicker/css/datepicker.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link rel="stylesheet" href="css/custom_css/skins/skin-default.css" type="text/css" id="skin" />
        <link rel="stylesheet" type="text/css" href="css/datepicker.css">
        <!--end of page level css-->
        <link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css">
        <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="vendors/animate/animate.min.css">
        <link rel="stylesheet" href="vendors/pnotify/css/pnotify.css">
        <link href="vendors/pnotify/css/pnotify.brighttheme.css" rel="stylesheet" type="text/css"/>
        <link href="vendors/pnotify/css/pnotify.buttons.css" rel="stylesheet" type="text/css"/>
        <link href="vendors/pnotify/css/pnotify.mobile.css" rel="stylesheet" type="text/css"/>
        <link href="vendors/pnotify/css/pnotify.history.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/custom_css/toastr_notificatons.css">



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

                                </div>
                                <div class="panel-body">
                                    <form id="institutionForm" class="form-horizontal" role="form">

                                        <input type="hidden" name="type" value="saveinstitution"/>
                                        <div class="form-group">
                                            <label for="input-text" class="col-sm-2 control-label"> Code</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="code" id="code" required >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label">Institution Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="institution_name" id="institution_name" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label">
                                                Date Of Establishment
                                            </label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-fw ti-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right" name="date_established" data-language='en' id="establishment_date" />
                                                </div> 
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label">Institution Types</label>
                                            <div class="col-sm-10">
                                                <select name="institution_types[]" id="institution_types"  class="form-control multselect select2" multiple style="width: 100%" required>
                                                    <option value="">Select value...</option>



                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label">Region</label>
                                            <div class="col-sm-10">
                                                <select id="region" name="region" class="form-control select2" style="width:100%">
                                                    <option value="">Select value...</option>



                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label">District</label>
                                            <div class="col-sm-10">
                                                <select id="district" name="district" class="form-control select2" style="width:100%">
                                                    <option value="">Select value...</option>



                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label">Location</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="location" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label">Latitude</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="latitude" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label">Longitude</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="longitude" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">￼

                                            <div class="pull-right">
                                                <input type="submit" name="submit" class="btn btn-info"  value="Submit"/>


                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="background-overlay"></div>
                </section>
            </aside>
        </div>

        <script src="js/app.js" type="text/javascript"></script>
        <!-- end of global js -->
        <!-- begining of page level js -->
        <script src="vendors/moment/js/moment.min.js" type="text/javascript"></script>
        <script src="vendors/datetime/js/jquery.datetimepicker.full.min.js" type="text/javascript"></script>
        <script src="vendors/airdatepicker/js/datepicker.min.js" type="text/javascript"></script>
        <script src="vendors/airdatepicker/js/datepicker.en.js" type="text/javascript"></script>
        <script src="js/custom_js/advanceddate_pickers.js"></script>
        <script src="vendors/bootstrap-multiselect/js/bootstrap-multiselect.js" type="text/javascript"></script>
        <script src="vendors/select2/js/select2.js" type="text/javascript"></script>
        <script src="js/custom_js/custom_elements.js" type="text/javascript"></script>
        <script type="text/javascript" src="vendors/pnotify/js/pnotify.js"></script>
        <script type="text/javascript" src="vendors/pnotify/js/pnotify.animate.js"></script>
        <script type="text/javascript" src="vendors/pnotify/js/pnotify.buttons.js"></script>
        <script type="text/javascript" src="vendors/pnotify/js/pnotify.confirm.js"></script>
        <script type="text/javascript" src="vendors/pnotify/js/pnotify.nonblock.js"></script>
        <script type="text/javascript" src="vendors/pnotify/js/pnotify.mobile.js"></script>
        <script type="text/javascript" src="vendors/pnotify/js/pnotify.desktop.js"></script>
        <script type="text/javascript" src="vendors/pnotify/js/pnotify.history.js"></script>
        <script type="text/javascript" src="vendors/pnotify/js/pnotify.callbacks.js"></script>
        <script src="js/custom_js/notifications.js"></script>
         <script src="js/institution.js" type="text/javascript"></script>
       
    </body>

</html>
