<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Form Wizards | Clear Admin Template</title>
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
        <link href="vendors/select2/css/select2.min.css" type="text/css" rel="stylesheet">
        <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet">
        <link href="vendors/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet">
        <link href="vendors/iCheck/css/all.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/custom.css">

        <link href="css/custom_css/wizard.css" rel="stylesheet">
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
                    <!--section starts-->
                    <h1>
                        New Staff
                    </h1>
                    <ol class="breadcrumb">

                        <li>
                            <a href="#">Staff </a>
                        </li>
                        <li class="active">
                            New Staff
                        </li>
                    </ol>
                </section>
                <!--section ends-->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel ">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i> New Staff
                                    </h3>
                                    <span class="right_aligned">
                                        <i class="fa fa-fw ti-angle-up clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <form id="commentForm" method="post" action="#">
                                        <div id="rootwizard">
                                            <ul>
                                                <li>
                                                    <a href="#tab1" data-toggle="tab">
                                                        <span>
                                                            <span>Basic Information</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab2" data-toggle="tab">
                                                        <span>
                                                            <span>Academic Details</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab3" data-toggle="tab">
                                                        <span>
                                                            <span>Employment Details</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab4" data-toggle="tab">
                                                        <span>
                                                            <span>Next Of KIn</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab5" data-toggle="tab">
                                                        <span>
                                                            <span>Bank Details</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane" id="tab1">
                                                    <h2 class="hidden">&nbsp;</h2>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">First Name *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email" class="control-label">Middle Name </label>
                                                                <input id="email" name="email" placeholder="Enter your Email"
                                                                       type="text" class="form-control naby1 email">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password" class="control-label">Last Name *</label>
                                                                <input id="password" name="password" type="password"
                                                                       placeholder="Enter your password" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputPassword" class=control-label">Gender *</label>

                                                                <select id="select21" class="form-control select2" style="width:100%">
                                                                    <option value="">Select value...</option>

                                                                    <option value="">Male</option>

                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">Date Of BIrth  *</label>
                                                                <input id="confirm" name="confirm" type="password"
                                                                       placeholder="Confirm your password "
                                                                       class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">PLace Of BIrth  *</label>
                                                                <input id="confirm" name="confirm" type="password"
                                                                       placeholder="Confirm your password "
                                                                       class="form-control naby1">
                                                            </div>        

                                                            <div class="form-group">
                                                                <label for="inputPassword" class=control-label">Region *</label>

                                                                <select id="select21" class="form-control select2" style="width:100%">
                                                                    <option value="">Select value...</option>

                                                                    <option value="">Male</option>

                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">Nationality  *</label>
                                                                <input id="confirm" name="confirm" type="password"
                                                                       placeholder="Confirm your password "
                                                                       class="form-control naby1">
                                                            </div>   

                                                            <div class="form-group">
                                                                <label for="inputPassword" class=control-label">Address *</label>

                                                                <textarea rows="5" style="width: 100%" ></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">SUburb  *</label>
                                                                <input id="confirm" name="confirm" type="password"
                                                                       placeholder="Confirm your password "
                                                                       class="form-control naby1">
                                                            </div>



                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Postal Address *</label>
                                                                <input id="userName" name="username" type="text"
                                                                       placeholder="Enter user name" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email" class="control-label">Contact NO </label>
                                                                <input id="email" name="email" placeholder="Enter your Email"
                                                                       type="text" class="form-control naby1 email">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password" class="control-label">EMail Address *</label>
                                                                <input id="password" name="password" type="password"
                                                                       placeholder="Enter your password" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputPassword" class=control-label">Marital Status *</label>

                                                                <select id="select21" class="form-control select2" style="width:100%">
                                                                    <option value="">Select value...</option>

                                                                    <option value="">Male</option>

                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">Identification Type  *</label>
                                                                <input id="confirm" name="confirm" type="password"
                                                                       placeholder="Confirm your password "
                                                                       class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">Identification Number  *</label>
                                                                <input id="confirm" name="confirm" type="password"
                                                                       placeholder="Confirm your password "
                                                                       class="form-control naby1">
                                                            </div>        



                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">Highest Qualification  *</label>
                                                                <input id="confirm" name="confirm" type="password"
                                                                       placeholder="Confirm your password "
                                                                       class="form-control naby1">
                                                            </div>   



                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">Current Appointment Date  *</label>
                                                                <input id="confirm" name="confirm" type="password"
                                                                       placeholder="Confirm your password "
                                                                       class="form-control naby1">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">Number Of Years  *</label>
                                                                <input id="confirm" name="confirm" type="password"
                                                                       placeholder="Confirm your password "
                                                                       class="form-control naby1">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">Staff Class  *</label>
                                                                <input id="confirm" name="confirm" type="password"
                                                                       placeholder="Confirm your password "
                                                                       class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">Area of Expertise  *</label>
                                                                <input id="confirm" name="confirm" type="password"
                                                                       placeholder="Confirm your password "
                                                                       class="form-control naby1">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="inputPassword" class=control-label">Department *</label>

                                                                <select id="select21" class="form-control select2" style="width:100%">
                                                                    <option value="">Select value...</option>

                                                                    <option value="">Male</option>

                                                                </select>
                                                            </div>


                                                        </div>


                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <h2 class="hidden">&nbsp;</h2>


                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Last Institution Complete *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Program Of Study *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Year  Of Completion *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Certificate TYpe *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Professional Body *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Professional Id *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                    <h2 class="hidden">&nbsp;</h2>


                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Start Date *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">End Date*</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Qualification *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Staff Class *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Grade *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Staff Id *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Employment Type *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab4">
                                                    <h2 class="hidden">&nbsp;</h2>


                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Next Of KIn *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputPassword" class=control-label">Relationship *</label>

                                                                <select id="select21" class="form-control select2" style="width:100%">
                                                                    <option value="">Select value...</option>

                                                                    <option value=""></option>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Address *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">SUburb *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Email Address *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Contact No *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Postal Address *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab5">
                                                    <h2 class="hidden">&nbsp;</h2>


                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Bank Name *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
           
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Account Name *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Account Number *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Branch *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">TIn  *</label>
                                                                <input  name="username" type="text" class="form-control naby1">
                                                            </div>
                                                          
                                                        </div>
                                                    </div>

                                                </div>



                                                <ul class="pager wizard">
                                                    <li class="previous">
                                                        <a>Previous</a>
                                                    </li>
                                                    <li class="next">
                                                        <a>Next</a>
                                                    </li>
                                                    <li class="next finish" style="display:none;">
                                                        <a>Finish</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">User Register</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>You have Submitted Successfully.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">OK
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--rightside bar -->
                    <div id="right">
                        <div id="right-slim">
                            <div class="rightsidebar-right">
                                <div class="rightsidebar-right-content">
                                    <div class="panel-tabs">
                                        <ul class="nav nav-tabs nav-float" role="tablist">
                                            <li class="active text-center">
                                                <a href="#r_tab1" role="tab" data-toggle="tab"><i
                                                        class="fa fa-fw ti-comments"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#r_tab2" role="tab" data-toggle="tab"><i class="fa fa-fw ti-bell"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#r_tab3" role="tab" data-toggle="tab"><i
                                                        class="fa fa-fw ti-settings"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="r_tab1">
                                            <div id="slim_t1">
                                                <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                                    <i class="menu-icon  fa fa-fw ti-user"></i>
                                                    Contacts
                                                </h5>
                                                <ul class="list-unstyled margin-none">
                                                    <li class="rightsidebar-contact-wrapper">
                                                        <a class="rightsidebar-contact" href="#">
                                                            <img src="img/authors/avatar6.jpg"
                                                                 class="img-circle pull-right" alt="avatar-image">
                                                            <i class="fa fa-circle text-xs text-primary"></i>
                                                            Annette
                                                        </a>
                                                    </li>
                                                    <li class="rightsidebar-contact-wrapper">
                                                        <a class="rightsidebar-contact" href="#">
                                                            <img src="img/authors/avatar.jpg"
                                                                 class="img-circle pull-right" alt="avatar-image">
                                                            <i class="fa fa-circle text-xs text-primary"></i>
                                                            Jordan
                                                        </a>
                                                    </li>
                                                    <li class="rightsidebar-contact-wrapper">
                                                        <a class="rightsidebar-contact" href="#">
                                                            <img src="img/authors/avatar2.jpg"
                                                                 class="img-circle pull-right" alt="avatar-image">
                                                            <i class="fa fa-circle text-xs text-primary"></i>
                                                            Stewart
                                                        </a>
                                                    </li>
                                                    <li class="rightsidebar-contact-wrapper">
                                                        <a class="rightsidebar-contact" href="#">
                                                            <img src="img/authors/avatar3.jpg"
                                                                 class="img-circle pull-right" alt="avatar-image">
                                                            <i class="fa fa-circle text-xs text-warning"></i>
                                                            Alfred
                                                        </a>
                                                    </li>
                                                    <li class="rightsidebar-contact-wrapper">
                                                        <a class="rightsidebar-contact" href="#">
                                                            <img src="img/authors/avatar4.jpg"
                                                                 class="img-circle pull-right" alt="avatar-image">
                                                            <i class="fa fa-circle text-xs text-danger"></i>
                                                            Eileen
                                                        </a>
                                                    </li>
                                                    <li class="rightsidebar-contact-wrapper">
                                                        <a class="rightsidebar-contact" href="#">
                                                            <img src="img/authors/avatar5.jpg"
                                                                 class="img-circle pull-right" alt="avatar-image">
                                                            <i class="fa fa-circle text-xs text-muted"></i>
                                                            Robert
                                                        </a>
                                                    </li>
                                                    <li class="rightsidebar-contact-wrapper">
                                                        <a class="rightsidebar-contact" href="#">
                                                            <img src="img/authors/avatar7.jpg"
                                                                 class="img-circle pull-right" alt="avatar-image">
                                                            <i class="fa fa-circle text-xs text-muted"></i>
                                                            Cassandra
                                                        </a>
                                                    </li>
                                                </ul>

                                                <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                                    <i class="fa fa-fw ti-export"></i>
                                                    Recent Updates
                                                </h5>
                                                <div>
                                                    <ul class="list-unstyled">
                                                        <li class="rightsidebar-notification">
                                                            <a href="#">
                                                                <i class="fa ti-comments-smiley fa-fw text-primary"></i>
                                                                New Comment
                                                            </a>
                                                        </li>
                                                        <li class="rightsidebar-notification">
                                                            <a href="#">
                                                                <i class="fa ti-twitter-alt fa-fw text-success"></i>
                                                                3 New Followers
                                                            </a>
                                                        </li>
                                                        <li class="rightsidebar-notification">
                                                            <a href="#">
                                                                <i class="fa ti-email fa-fw text-info"></i>
                                                                Message Sent
                                                            </a>
                                                        </li>
                                                        <li class="rightsidebar-notification">
                                                            <a href="#">
                                                                <i class="fa ti-write fa-fw text-warning"></i>
                                                                New Task
                                                            </a>
                                                        </li>
                                                        <li class="rightsidebar-notification">
                                                            <a href="#">
                                                                <i class="fa ti-export fa-fw text-danger"></i>
                                                                Server Rebooted
                                                            </a>
                                                        </li>
                                                        <li class="rightsidebar-notification">
                                                            <a href="#">
                                                                <i class="fa ti-info-alt fa-fw text-primary"></i>
                                                                Server Not Responding
                                                            </a>
                                                        </li>
                                                        <li class="rightsidebar-notification">
                                                            <a href="#">
                                                                <i class="fa ti-shopping-cart fa-fw text-success"></i>
                                                                New Order Placed
                                                            </a>
                                                        </li>
                                                        <li class="rightsidebar-notification">
                                                            <a href="#">
                                                                <i class="fa ti-money fa-fw text-info"></i>
                                                                Payment Received
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="r_tab2">
                                            <div id="slim_t2">
                                                <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                                    <i class="fa fa-fw ti-bell"></i>
                                                    Notifications
                                                </h5>
                                                <ul class="list-unstyled m-t-15 notifications">
                                                    <li>
                                                        <a href="" class="message icon-not striped-col">
                                                            <img class="message-image img-circle"
                                                                 src="img/authors/avatar3.jpg" alt="avatar-image">

                                                            <div class="message-body">
                                                                <strong>John Doe</strong>
                                                                <br>
                                                                5 members joined today
                                                                <br>
                                                                <small class="noti-date">Just now</small>
                                                            </div>

                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="message icon-not">
                                                            <img class="message-image img-circle"
                                                                 src="img/authors/avatar.jpg" alt="avatar-image">
                                                            <div class="message-body">
                                                                <strong>Tony</strong>
                                                                <br>
                                                                likes a photo of you
                                                                <br>
                                                                <small class="noti-date">5 min</small>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="message icon-not striped-col">
                                                            <img class="message-image img-circle"
                                                                 src="img/authors/avatar6.jpg" alt="avatar-image">

                                                            <div class="message-body">
                                                                <strong>John</strong>
                                                                <br>
                                                                Dont forgot to call...
                                                                <br>
                                                                <small class="noti-date">11 min</small>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="message icon-not">
                                                            <img class="message-image img-circle"
                                                                 src="img/authors/avatar1.jpg" alt="avatar-image">
                                                            <div class="message-body">
                                                                <strong>Jenny Kerry</strong>
                                                                <br>
                                                                Done with it...
                                                                <br>
                                                                <small class="noti-date">1 Hour</small>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="message icon-not striped-col">
                                                            <img class="message-image img-circle"
                                                                 src="img/authors/avatar7.jpg" alt="avatar-image">

                                                            <div class="message-body">
                                                                <strong>Ernest Kerry</strong>
                                                                <br>
                                                                2 members joined today
                                                                <br>
                                                                <small class="noti-date">3 Days</small>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="text-right noti-footer"><a href="#">View All Notifications <i
                                                                class="ti-arrow-right"></i></a></li>
                                                </ul>
                                                <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                                    <i class="fa fa-fw ti-check-box"></i>
                                                    Tasks
                                                </h5>
                                                <ul class="list-unstyled m-t-15">
                                                    <li>
                                                        <div>
                                                            <p>
                                                                <span>Button Design</span>
                                                                <small class="pull-right text-muted">40%</small>
                                                            </p>
                                                            <div class="progress progress-xs progress-striped active">
                                                                <div class="progress-bar progress-bar-success"
                                                                     role="progressbar"
                                                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                                     style="width: 40%">
                                                                    <span class="sr-only">40% Complete (success)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <p>
                                                                <span>Theme Creation</span>
                                                                <small class="pull-right text-muted">20%</small>
                                                            </p>
                                                            <div class="progress progress-xs progress-striped active">
                                                                <div class="progress-bar progress-bar-info" role="progressbar"
                                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                                     style="width: 20%">
                                                                    <span class="sr-only">20% Complete</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <p>
                                                                <span>XYZ Task To Do</span>
                                                                <small class="pull-right text-muted">60%</small>
                                                            </p>
                                                            <div class="progress progress-xs progress-striped active">
                                                                <div class="progress-bar progress-bar-warning"
                                                                     role="progressbar"
                                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                     style="width: 60%">
                                                                    <span class="sr-only">60% Complete (warning)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <p>
                                                                <span>Transitions Creation</span>
                                                                <small class="pull-right text-muted">80%</small>
                                                            </p>
                                                            <div class="progress progress-xs progress-striped active">
                                                                <div class="progress-bar progress-bar-danger" role="progressbar"
                                                                     aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                                     style="width: 80%">
                                                                    <span class="sr-only">80% Complete (danger)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="text-right"><a href="#">View All Tasks <i
                                                                class="ti-arrow-right"></i></a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="r_tab3">
                                            <div id="slim_t3">
                                                <h5 class="rightsidebar-right-heading text-uppercase gen-sett-m-t text-xs">
                                                    <i class="fa fa-fw ti-settings"></i>
                                                    General
                                                </h5>
                                                <ul class="list-unstyled settings-list m-t-10">
                                                    <li>
                                                        <label for="status">Available</label>
                                                        <span class="pull-right">
                                                            <input type="checkbox" id="status" name="my-checkbox" checked>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <label for="email-auth">Login with Email</label>
                                                        <span class="pull-right">
                                                            <input type="checkbox" id="email-auth" name="my-checkbox">
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <label for="update">Auto Update</label>
                                                        <span class="pull-right">
                                                            <input type="checkbox" id="update" name="my-checkbox">
                                                        </span>
                                                    </li>

                                                </ul>
                                                <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                                    <i class="fa fa-fw ti-volume"></i>
                                                    Sound & Notification
                                                </h5>
                                                <ul class="list-unstyled settings-list m-t-10">
                                                    <li>
                                                        <label for="chat-sound">Chat Sound</label>
                                                        <span class="pull-right">
                                                            <input type="checkbox" id="chat-sound" name="my-checkbox" checked>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <label for="noti-sound">Notification Sound</label>
                                                        <span class="pull-right">
                                                            <input type="checkbox" id="noti-sound" name="my-checkbox">
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <label for="remain">Remainder </label>
                                                        <span class="pull-right">
                                                            <input type="checkbox" id="remain" name="my-checkbox" checked>
                                                        </span>

                                                    </li>
                                                    <li>
                                                        <label for="vol">Volume</label>
                                                        <input type="range" id="vol" min="0" max="100" value="15">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="background-overlay"></div>
                </section>
                <!-- content -->
            </aside>
            <!-- /.right-side -->
        </div>
        <!-- ./wrapper -->
        <!-- global js -->
        <script src="js/app.js" type="text/javascript"></script>
        <!-- end of global js -->
        <!-- begining of page level js -->
        <script src="vendors/iCheck/js/icheck.js"></script>
        <script src="vendors/moment/js/moment.min.js"></script>
        <script src="vendors/select2/js/select2.js" type="text/javascript"></script>
        <script src="vendors/bootstrapwizard/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
        <script src="vendors/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
        <script src="js/custom_js/form_wizards.js" type="text/javascript"></script>
        <!-- end of page level js -->
    </body>

</html>
