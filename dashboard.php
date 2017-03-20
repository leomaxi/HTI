<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clear Admin Template | Clear Admin Template </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- global css -->
        <link type="text/css" rel="stylesheet" href="css/app.css"/>
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link rel="stylesheet" href="css/custom_css/skins/skin-default.css" type="text/css" id="skin"/>
        <!-- end of global css -->
        <!--page level css -->
        <link href="vendors/nvd3/css/nv.d3.min.css" rel="stylesheet" type="text/css">
        <!--weathericons-->
        <link href="vendors/weathericon/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="vendors/metrojs/css/MetroJs.min.css">

        <link href="css/custom_css/dashboard2.css" rel="stylesheet" type="text/css"/>
        <!--end of page level css-->
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

                <section class="content">
                    dashboard here
                    <!-- /#right -->
                    <div class="background-overlay"></div>
                </section>
                <!-- /.content --> </aside>
            <!-- /.right-side --> </div>
        <!-- ./wrapper -->
        <!-- global js -->
        <div id="qn"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <script src="https://cdn.jsdelivr.net/g/bootstrap@3.3.7,bootstrap.switch@3.3.2,jquery.nicescroll@3.6.0"></script> <script src="js/app.js" type="text/javascript"></script><!-- end of global js -->

        <!-- begining of page level js -->
        <!--nvd3 chart-->
        <script type="text/javascript" src="vendors/d3/d3.min.js"></script>
        <script type="text/javascript" src="vendors/nvd3/js/nv.d3.min.js"></script>
        <script type="text/javascript" src="vendors/screenfull/js/screenfull.min.js"></script>
        <!--Sparkline Chart-->
        <script src="js/custom_js/sparkline/jquery.flot.spline.js"></script>
        <!--knob-->
        <script type="text/javascript" src="vendors/jquery-knob/js/jquery.knob.js"></script>
        <!--metrojs-->
        <script type="text/javascript" src="vendors/metrojs/js/MetroJs.min.js"></script>

        <script src="js/dashboard2.js" type="text/javascript"></script>
        <!-- end of page level js -->

    </body>

</html>
<!-- Localized -->