<?php
session_start();
if ($_SESSION['login_valid'] != "YES") {
    ?>
    <script type="text/javascript">
        window.location = 'index.php';
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Region</title>
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
        <link href="vendors/toastr/css/toastr.min.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/custom.css">

        <link rel="stylesheet" type="text/css" href="css/custom_css/datatables_custom.css">
        <link rel="stylesheet" type="text/css" href="css/custom_css/advanced_modals.css">
        <link rel="stylesheet" type="text/css" href="css/custom_css/toastr_notificatons.css">

        <!--end of page level css-->
    </head>

    <body class="skin-default">
        <div class="preloader">
            <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
        </div>
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
                        Region
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">
                                <i class="fa fa-fw ti-home"></i> Configurations
                            </a>
                        </li>

                        <li class="active">
                            Regions
                        </li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="">
                        <div class="right_aligned" style="margin-bottom: 15px;">
                            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#region_modal">
                                Add Region
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">


                            <div class="panel ">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="ti-layout-grid3"></i> Regions
                                    </h3>

                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="regionTbl">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Name
                                                    </th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="region_modal" class="modal fade animated" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">New Region</h4>
                                </div>
                                <form role="form" id="saveRegionForm">
                                    <input type="hidden" name="type" value="saveRegion"/>
                                    <div class="modal-body">
                                        <div class="row m-t-10">



                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <label for="first-name">Region Name</label>
                                                    <input type="text" name="region"
                                                           placeholder="Region Name" required class="form-control m-t-10">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Submit</button>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="background-overlay"></div>
                </section>
                <!-- /.content -->
            </aside>
            <!-- /.right-side -->
        </div>
        <!-- ./wrapper -->
        <!-- global js -->
        <script src="js/app.js" type="text/javascript"></script>
        <!-- end of global js -->
        <!-- begining of page level js -->
        <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="js/custom_js/datatables_custom.js"></script>
        <script src="vendors/toastr/js/toastr.min.js"></script>
        <script src="vendors/iCheck/js/icheck.js"></script>
        <script type="text/javascript" src="js/custom_js/toastr_notifications.js"></script>
        <script type="text/javascript" src="js/region.js"></script>
        <!-- end of page level js -->
    </body>

</html>
