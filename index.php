<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- end of bootstrap -->
        <!--page level css -->
        <link type="text/css" href="vendors/themify/css/themify-icons.css" rel="stylesheet"/>
        <link href="vendors/iCheck/css/all.css" rel="stylesheet">
        <link href="vendors/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet"/>
        <link href="css/login.css" rel="stylesheet">
        <!--end page level css-->
    </head>

    <body id="sign-in">
        <div class="preloader">
            <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 login-form">
                    <div class="panel-header">
                        <h2 class="text-center">
        <!--                    <img src="img/pages/clear_black.png" alt="Logo">-->
                            HTI
                        </h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <form action="dashboard.php" id="authentication" method="post" class="login_validator">
                                    <div class="form-group">
                                        <label for="email" class="sr-only"> E-mail</label>
                                        <input type="text" class="form-control  form-control-lg" id="email" name="username"
                                               placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="sr-only">Password</label>
                                        <input type="password" class="form-control form-control-lg" id="password"
                                               name="password" placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Sign In" class="btn btn-primary btn-block"/>

                                    </div>               


                                    <span class="pull-right sign-up">
                                        <a href="forgot_password.html" id="forgot" class="forgot"> Forgot Password ? </a>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- global js -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- end of global js -->
        <!-- page level js -->
        <script type="text/javascript" src="vendors/iCheck/js/icheck.js"></script>
        <script src="vendors/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/custom_js/login.js"></script>
        <!-- end of page level js -->
    </body>

</html>

<!-- Localized -->