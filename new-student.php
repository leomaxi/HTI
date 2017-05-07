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
        <title>New Staff</title>
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
        <link rel="stylesheet" href="vendors/datetime/css/jquery.datetimepicker.css">
        <link href="vendors/airdatepicker/css/datepicker.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/datepicker.css">
        <link rel="stylesheet" type="text/css" href="css/sweet-alert.min-v2.2.0.css">

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
                        New Student

                    </h1>
                    <ol class="breadcrumb">

                        <li>
                            <a href="#">Students </a>
                        </li>
                        <li class="active">
                            New Student
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
                                           data-hc="white"></i> 
                                        New Student
                                    </h3>

                                </div>
                                <div class="panel-body">
                                    <form id="studentForm" method="post" action="#">
                                        <input type="hidden" name="type" value="saveStudent"/>
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
                                                            <span>Guardian Information</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab3" data-toggle="tab">
                                                        <span>
                                                            <span>Academic Details</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab4" data-toggle="tab">
                                                        <span>
                                                            <span>Enrollment Details</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab5" data-toggle="tab">
                                                        <span>
                                                            <span>Next Of Kin</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab6" data-toggle="tab">
                                                        <span>
                                                            <span>Banking Details</span>
                                                        </span>
                                                    </a>
                                                </li>

                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane" id="tab1">
                                                    <h2 class="hidden">&nbsp;</h2>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <?php
                                                            
                                                            if (($_SESSION['usergroup'] == 'admin') && !isset($_SESSION['institute_code'])) {
                                                                echo '    
                                                                    <div class="form-group">
                                                                  <label class="control-label">Instituitions *</label>

                                                                    <select id="instituitions" name="institute_code" class="form-control select2" style="width:100%">
                                                                                     <option>Choose</option>
                                                                </select></div>';
                                                            }
                                                            ?>

                                                            <div class="form-group">
                                                                <label class="control-label">First Name *</label>
                                                                <input id="firstname"  name="firstname" type="text" class="form-control required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Middle Name </label>
                                                                <input id="middlename" name="middlename" 
                                                                       type="text" class="form-control required ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Last Name *</label>
                                                                <input id="lastname" name="lastname" type="text"
                                                                       class="form-control required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class=control-label">Gender *</label>

                                                                <select id="gender" name="gender" class="form-control select2" style="width:100%">
                                                                    <option value="" selected>Select value...</option>

                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label  class="control-label">Date Of BIrth  *</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-fw ti-calendar"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control pull-right" name="dateofbirth" data-language='en' id="dateofbirth" />
                                                                </div> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Place of Birth  </label>
                                                                <input id="placeofbirth" name="placeofbirth" type="text"

                                                                       class="form-control ">
                                                            </div>        

                                                            <div class="form-group">
                                                                <label for="inputPassword" class=control-label">Region </label>

                                                                <select  id="region" name="region" class="form-control select2" style="width:100%">
                                                                    <option value="">Select value...</option>

                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label  class=control-label">Address *</label>

                                                                <textarea name="address"rows="5" style="width: 100%" ></textarea>
                                                            </div>



                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label  class="control-label">Nationality  *</label>
                                                                <input id="nationality" name="nationality" type="text" class="form-control required">
                                                            </div>   

                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">Suburb  *</label>
                                                                <input id="suburb" name="suburb" type="text" class="form-control required">

                                                            </div>

                                                            <div class="form-group">
                                                                <label  class=control-label">Marital Status </label>

                                                                <select id="marital_status" name="marital_status" class="form-control select2" style="width:100%">
                                                                    <option value="">Select value...</option>

                                                                    <option value="single">Single</option>
                                                                    <option value="married">Married</option>
                                                                    <option value="divorced">Divorced</option>
                                                                    <option value="widow">Widow</option>
                                                                    <option value="widower">Widower</option>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Postal Address *</label>
                                                                <input id="postal_address" name="postal_address" type="text"
                                                                       class="form-control required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Contact No *</label>
                                                                <input id="contactno" name="contactno" 
                                                                       type="text" class="form-control required ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password" class="control-label">Email Address *</label>
                                                                <input id="email" name="email" type="email"
                                                                       class="form-control required email">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">Identification Type  </label>
                                                                <select id="identification_type" name="identification_type" class="form-control select2" style="width:100%">
                                                                    <option value="">Select value...</option>

                                                                    <option value="NHIS">NHIS</option>
                                                                    <option value="Voters IDCard">Voters IDCard</option>
                                                                    <option value="Drivers License">Drivers License</option>
                                                                    <option value="Passport">Passport</option>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="confirm" class="control-label">Identification Number  </label>
                                                                <input id="identification_number" name="identification_number" 
                                                                       type="text" class="form-control required ">
                                                            </div>        








                                                        </div>


                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <h2 class="hidden">&nbsp;</h2>


                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Guardian Firstname</label>
                                                                <input  name="guardian_firstname" type="text" class="form-control ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Guardian Lastname </label>
                                                                <input  name="guardian_lastname" id="guardian_lastname" type="text" class="form-control ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Address </label>
                                                                <input  name="guardian_address" id="guardian_address" type="text" class="form-control ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Mobile No </label>
                                                                <input  name="guardian_contact" id="guardian_contact" type="text" class="form-control ">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label  class="control-label">Email </label>
                                                                <input  name="guardian_email" id="guardian_email" type="email" class="form-control ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Suburb </label>
                                                                <input  name="guardian_suburb" id="guardian_suburb" type="text" class="form-control ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">State </label>
                                                                <input  name="guardian_state" id="guardian_state" type="text" class="form-control ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">PostCode </label>
                                                                <input  name="guardian_postcode" id="guardian_postcode" type="text" class="form-control ">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="tab-pane" id="tab3">
                                                    <h2 class="hidden">&nbsp;</h2>


                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Last Institution Complete </label>
                                                                <input  name="last_institution_completed" name="last_institution_completed" type="text" class="form-control ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Program Of Study </label>
                                                                <input  name="programofstudy" id="programofstudy" type="text" class="form-control ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Year  of Completion </label>
                                                                <input  name="completion_year" id="completion_year" type="text" class="form-control ">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label  class="control-label">Examination Type </label>
                                                                <input  name="examination_type" id="examination_type" type="text" class="form-control ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Aggregate </label>
                                                                <input  name="aggregate" id="aggregate" type="text" class="form-control ">
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="tab-pane" id="tab4">
                                                    <h2 class="hidden">&nbsp;</h2>


                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">

                                                            <div class="form-group">
                                                                <label class="control-label">Program of Study *</label>
                                                                <input  name="program" id="program" type="text" class="form-control required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Year of Admission *</label>
                                                                <input  name="admission_year" type="text" id="admission_year" class="form-control required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Professional Body of Association *</label>
                                                                <input  name="professional_body" id="professional_body" type="text" class="form-control required">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">


                                                            <div class="form-group">
                                                                <label class="control-label">Year of Seating for Licensetial </label>
                                                                <input  name="year_of_seating" id="year_of_seating" type="text" class="form-control ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Results *</label>
                                                                <input  name="results" id="results" type="text" class="form-control required">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab5">
                                                    <h2 class="hidden">&nbsp;</h2>


                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label  class="control-label">Next of Kin </label>
                                                                <input  name="nextofkin" id="nextofkin" type="text" class="form-control required"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class=control-label">Relationship </label>

                                                                <select id="kin_relationship" name="kin_relationship" class="form-control select2" style="width:100%">
                                                                    <option value="">Select value...</option>
                                                                    <option value="Brother">Brother</option>
                                                                    <option value="Sister">Sister</option>
                                                                    <option value="Daughter">Daughter</option>
                                                                    <option value="Son">Son</option>
                                                                    <option value="Mother">Mother</option>
                                                                    <option value="Father">Father</option>
                                                                    <option value="Husband">Husband</option>
                                                                    <option value="Wife">Wife</option>


                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="userName" class="control-label">Address </label>
                                                                <textarea rows="5" name="kin_address" id="kin_address" style="width: 100%" ></textarea>

                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Suburb </label>
                                                                <input  name="kin_suburb" id="kin_suburb" type="text" class="form-control required">
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label  class="control-label">Email Address </label>
                                                                <input  name="kin_email" id="kin_email" type="email" class="form-control required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Contact No </label>
                                                                <input  name="kin_contactno" id="kin_contactno" type="text" class="form-control required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Postal Address </label>
                                                                <input  name="kin_postal" id="kin_postal" type="text" class="form-control required">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab6">
                                                    <h2 class="hidden">&nbsp;</h2>


                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label  class="control-label">Bank Name *</label>
                                                                <input  name="bank_name" id="bank_name" type="text" class="form-control required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Branch *</label>
                                                                <input  name="branch" id="branch" type="text" class="form-control required">
                                                            </div>

                                                            <div class="form-group">
                                                                <label  class="control-label">Account Name *</label>
                                                                <input  name="account_name" id="account_name" type="text" class="form-control required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Account Number *</label>
                                                                <input  name="account_number" id="account_number" type="text" class="form-control required">
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">

                                                            <div class="form-group">
                                                                <label  class="control-label">BSB*</label>
                                                                <input  name="BSB" id="BSB" type="text" class="form-control required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="control-label">Name of Superannutation fund</label>
                                                                <input  name="superannutation_fund" id="superannutation_fund" type="text" class="form-control required">
                                                            </div>
                                                              <div class="form-group">
                                                                <label  class="control-label">Start Date  *</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-fw ti-calendar"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control pull-right" name="startdate" data-language='en' id="startdate" />
                                                                </div> 
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label  class="control-label">Tax Identification Number</label>
                                                                <input  name="tin" id="tin" type="text" class="form-control required">
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
                                    </form>
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Staff Register</h4>
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
  <div class="modal fade" id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
            <div class="modal-dialog" role="document">


                <div  id="loader" style="margin-top:30% ">
                    <img src="img/loading.gif">
                   
                    <span class="loader-text">Filtering Results...</span>
                </div>


            </div>
        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--rightside bar -->
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
<!--        <script src="js/custom_js/form_wizards.js" type="text/javascript"></script>-->
        <!-- end of page level js -->
        <script src="vendors/moment/js/moment.min.js" type="text/javascript"></script>
        <script src="vendors/datetime/js/jquery.datetimepicker.full.min.js" type="text/javascript"></script>
        <script src="vendors/airdatepicker/js/datepicker.min.js" type="text/javascript"></script>
        <script src="vendors/airdatepicker/js/datepicker.en.js" type="text/javascript"></script>
<!--        <script src="js/custom_js/advanceddate_pickers.js"></script>
        <script src="js/custom_js/custom_elements.js"></script>-->   
        <script src="js/sweet-alert.min.js"></script>


        <script src="js/student.js"></script>
    </body>

</html>
