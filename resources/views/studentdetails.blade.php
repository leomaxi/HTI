
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            {{$studentinfo[0]['firstname'].' '.$studentinfo[0]['surname']}} Information
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="fa fa-fw ti-home"></i> Staff
                </a>
            </li>

            <li>
                Staff Information
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
       <div class="row">
            <div class="col-lg-12">
                <form id="updateStudentInfo" method='post'>
                    <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />
                    <input type="hidden" class="form-control form-control-lg input-lg"  name="code" value="{{$studentinfo[0]['code']}}" />

                    <div class="panel">
                        <div class="panel-heading tab-list">
                            <ul class="nav nav-tabs ">
                                <li class="active">
                                    <a href="#tab1" data-toggle="tab">
                                        Basic Information
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab">
                                        Guardian Information
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab">
                                        Academic Details
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab4" data-toggle="tab">
                                        Enrollment Details
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab5" data-toggle="tab">
                                        Next Of KIn
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab6" data-toggle="tab">
                                        Bank Details
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade active in">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">

                                            <div class="form-group">
                                                <label class="control-label">Institution Name</label>
                                                <input readonly  name="institution_name" value="{{$studentinfo[0]['institution_name']}}" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">New Institution *</label>

                                                <select id="instituitions" name="institute_code" class="form-control select2" style="width:100%">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label">First Name *</label>
                                                <input id="firstname"  name="firstname" value="{{$studentinfo[0]['firstname']}}" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Middle Name </label>
                                                <input id="middlename" name="middlename" 
                                                       type="text" value="{{$studentinfo[0]['middlename']}}"  class="form-control required ">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Last Name *</label>
                                                <input id="lastname" value="{{$studentinfo[0]['surname']}}"  name="lastname" type="text"
                                                       class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label class=control-label">Gender *</label>

                                                <select id="gender" name="gender" class="form-control select2" style="width:100%">

                                                    <option value="" <?php if ($studentinfo[0]['gender'] == "") echo 'selected="selected"'; ?> >Select value...</option>

                                                    <option value="male" <?php if ($studentinfo[0]['gender'] == "male") echo 'selected="selected"'; ?>>Male</option>
                                                    <option value="female" <?php if ($studentinfo[0]['gender'] == "female") echo 'selected="selected"'; ?>>Female</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label  class=control-label">Marital Status </label>

                                                <select id="marital_status" name="marital_status" class="form-control select2" style="width:100%">
                                                    <option value="" <?php if ($studentinfo[0]['marital_status'] == "") echo 'selected="selected"'; ?>>Select value...</option>

                                                    <option value="single" <?php if ($studentinfo[0]['marital_status'] == "single") echo 'selected="selected"'; ?>>Single</option>
                                                    <option value="married" <?php if ($studentinfo[0]['marital_status'] == "married") echo 'selected="selected"'; ?>>Married</option>
                                                    <option value="divorced" <?php if ($studentinfo[0]['marital_status'] == "divorced") echo 'selected="selected"'; ?>>Divorced</option>
                                                    <option value="widow" <?php if ($studentinfo[0]['marital_status'] == "widow") echo 'selected="selected"'; ?>>Widow</option>
                                                    <option value="widower" <?php if ($studentinfo[0]['marital_status'] == "widower") echo 'selected="selected"'; ?>>Widower</option>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label  class="control-label">Date Of BIrth  *</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-fw ti-calendar"></i>
                                                    </div>
                                                    <input type="text" value="{{$studentinfo[0]['dob']}}"  class="form-control pull-right" name="dateofbirth" data-language='en' id="dateofbirth" />
                                                </div> 
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Place of Birth  </label>
                                                <input id="placeofbirth" value="{{$studentinfo[0]['place_of_birth']}}"  name="placeofbirth" type="text"

                                                       class="form-control ">
                                            </div>        

                                            <div class="form-group">
                                                <label class="control-label">Region Name</label>
                                                <input readonly  name="region_name" value="{{$studentinfo[0]['region_name']}}" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class=control-label">Region </label>

                                                <select  id="region" name="region" class="form-control select2" style="width:100%">
                                                    <option value="">Select value...</option>

                                                </select>
                                            </div>






                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">District Name</label>
                                                <input readonly  name="district_name" value="{{$studentinfo[0]['district_name']}}" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class=control-label">District </label>

                                                <select  id="district" name="district" class="form-control select2" style="width:100%">
                                                    <option value="">Select value...</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Nationality  *</label>
                                                <input id="nationality" value="{{$studentinfo[0]['nationality']}}"  name="nationality" type="text" class="form-control required">
                                            </div>   

                                            <div class="form-group">
                                                <label for="confirm" class="control-label">Suburb  *</label>
                                                <input id="suburb" value="{{$studentinfo[0]['suburb']}}"  name="suburb" type="text" class="form-control required">

                                            </div>
                                            <div class="form-group">
                                                <label  class=control-label">Res. Address *</label>

                                                <textarea name="address"rows="5" style="width: 100%" >
                                                    {{$studentinfo[0]['address']}}
                                                </textarea>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Postal Address *</label>
                                                <input id="postal_address" value="{{$studentinfo[0]['postcode']}}"  name="postal_address" type="text"
                                                       class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Contact No *</label>
                                                <input id="contactno" name="contactno" value="{{$studentinfo[0]['contact_no']}}" 
                                                       type="text" class="form-control required ">
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="control-label">Email Address *</label>
                                                <input id="email" value="{{$studentinfo[0]['email_address']}}"  name="email" type="email"
                                                       class="form-control required email">
                                            </div>

                                            <div class="form-group">
                                                <label for="confirm" class="control-label">Identification Type  </label>
                                                <select id="identification_type" name="identification_type" class="form-control select2" style="width:100%">
                                                    <option value="">Select value...</option>

                                                    <option value="NHIS"  <?php if ($studentinfo[0]['identification_type'] == "NHIS") echo 'selected="selected"'; ?>>NHIS</option>
                                                    <option value="Voters IDCard"  <?php if ($studentinfo[0]['identification_type'] == "Voters IDCard") echo 'selected="selected"'; ?>>Voters IDCard</option>
                                                    <option value="Drivers License"  <?php if ($studentinfo[0]['identification_type'] == "Drivers License") echo 'selected="selected"'; ?>>Drivers License</option>
                                                    <option value="Passport"  <?php if ($studentinfo[0]['identification_type'] == "Passport") echo 'selected="selected"'; ?>>Passport</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm" class="control-label">Identification Number  </label>
                                                <input id="identification_number" name="identification_number" 
                                                       value="{{$studentinfo[0]['identification_number']}}"     type="text" class="form-control required ">
                                            </div>        








                                        </div>


                                    </div>

                                </div>
                                <div id="tab2" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Guardian Firstname</label>
                                                <input  name="guardian_firstname" value="{{$studentinfo[0]['guardian_firstname']}}" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Guardian Lastname </label>
                                                <input  name="guardian_lastname" value="{{$studentinfo[0]['guardian_surname']}}" id="guardian_lastname" type="text" class="form-control ">
                                            </div>

                                            <div class="form-group">
                                                <label  class="control-label">Mobile No </label>
                                                <input  name="guardian_contact" id="guardian_contact" value="{{$studentinfo[0]['guardian_contact']}}" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Email </label>
                                                <input  name="guardian_email" id="guardian_email" value="{{$studentinfo[0]['guardian_emailaddress']}}" type="email" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
<!--                                            <div class="form-group">
                                                <label  class="control-label">State </label>
                                                <input  name="guardian_state" id="guardian_state" value="{{$studentinfo[0]['middlename']}}" type="text" class="form-control ">
                                            </div>-->
                                            <div class="form-group">
                                                <label  class="control-label">Suburb </label>
                                                <input  name="guardian_suburb" id="guardian_suburb" value="{{$studentinfo[0]['guardian_suburb']}}" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Res. Address </label>
                                                <input  name="guardian_address" id="guardian_address" value="{{$studentinfo[0]['guardian_address']}}" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Postal Address </label>
                                                <input  name="guardian_postcode" id="guardian_postcode" value="{{$studentinfo[0]['guardian_postal_address']}}" type="text" class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab3" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Last Institution Complete </label>
                                                <input value="{{$studentinfo[0]['last_instituition']}}"  name="last_institution_completed" name="last_institution_completed" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Program Of Study </label>
                                                <input  value="{{$studentinfo[0]['program']}}" name="programofstudy" id="programofstudy" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Year  of Completion </label>
                                                <input value="{{$studentinfo[0]['completion_year']}}" name="completion_year" id="completion_year" type="text" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label  class="control-label">Examination Type </label>
                                                <input value="{{$studentinfo[0]['examination_type']}}" name="examination_type" id="examination_type" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Aggregate </label>
                                                <input value="{{$studentinfo[0]['aggregate']}}"  name="aggregate" id="aggregate" type="text" class="form-control ">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div id="tab4" class="tab-pane fade">

                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">

                                            <div class="form-group">
                                                <label class="control-label">Program of Study *</label>
                                                <input value="{{$studentinfo[0]['program']}}"  name="program" id="program" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Year of Admission *</label>
                                                <input value="{{$studentinfo[0]['admission_year']}}" name="admission_year" type="text" id="admission_year" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Professional Body of Association *</label>
                                                <input value="{{$studentinfo[0]['professional_body']}}"  name="professional_body" id="professional_body" type="text" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">

                                            <div class="form-group">
                                                <label  class="control-label">Certificate Type *</label>
                                                <input  name="certificatype" value="{{$studentinfo[0]['certificate_type']}}" type="text" class="form-control required">
                                            </div> 
                                            <div class="form-group">
                                                <label class="control-label">Year of Seating for Licensetial </label>
                                                <input value="{{$studentinfo[0]['sitting_year']}}"  name="year_of_seating" id="year_of_seating" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Index No *</label>
                                                <input value="{{$studentinfo[0]['results']}}"  name="indexno" id="results" type="text" class="form-control required">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="tab5" class="tab-pane fade">


                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label  class="control-label">Next of Kin </label>
                                                <input value="{{$studentinfo[0]['next_of_kin']}}"  name="nextofkin" id="nextofkin" type="text" class="form-control required"/>
                                            </div>
                                            <div class="form-group">
                                                <label  class=control-label">Relationship </label>

                                                <select id="kin_relationship" name="kin_relationship" class="form-control select2" style="width:100%">
                                                    <option value="">Select value...</option>
                                                    <option value="Brother" <?php if ($studentinfo[0]['relationship'] == "Brother") echo 'selected="selected"'; ?>>Brother</option>
                                                    <option value="Sister" <?php if ($studentinfo[0]['relationship'] == "Sister") echo 'selected="selected"'; ?>>Sister</option>
                                                    <option value="Daughter" <?php if ($studentinfo[0]['relationship'] == "Daughter") echo 'selected="selected"'; ?>>Daughter</option>
                                                    <option value="Son" <?php if ($studentinfo[0]['relationship'] == "Son") echo 'selected="selected"'; ?>>Son</option>
                                                    <option value="Mother" <?php if ($studentinfo[0]['relationship'] == "Mother") echo 'selected="selected"'; ?>>Mother</option>
                                                    <option value="Father" <?php if ($studentinfo[0]['relationship'] == "Father") echo 'selected="selected"'; ?>>Father</option>
                                                    <option value="Husband" <?php if ($studentinfo[0]['relationship'] == "Husband") echo 'selected="selected"'; ?>>Husband</option>
                                                    <option value="Wife" <?php if ($studentinfo[0]['relationship'] == "Wife") echo 'selected="selected"'; ?>>Wife</option>


                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label  class="control-label">Email Address </label>
                                                <input  value="{{$studentinfo[0]['kin_email']}}" name="kin_email" id="kin_email" type="email" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Contact No </label>
                                                <input value="{{$studentinfo[0]['kin_contactno']}}" name="kin_contactno" id="kin_contactno" type="text" class="form-control required">
                                            </div>


                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
<!--                                            <div class="form-group">
                                                <label  class="control-label">Suburb </label>
                                                <input value="{{$studentinfo[0]['aggregate']}}"  name="kin_suburb" id="kin_suburb" type="text" class="form-control required">
                                            </div>-->
                                            <div class="form-group">
                                                <label for="userName" class="control-label">Res. Address </label>
                                                <textarea rows="5" name="kin_address" id="kin_address" style="width: 100%" >
                                                   {{$studentinfo[0]['kin_address']}} 
                                                </textarea>

                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Postal Address </label>
                                                <input value="{{$studentinfo[0]['kin_postcode']}}"  name="kin_postal" id="kin_postal" type="text" class="form-control required">
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
                                                <input value="{{$studentinfo[0]['bank_name']}}" name="bank_name" id="bank_name" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Branch *</label>
                                                <input value="{{$studentinfo[0]['branch']}}" name="branch" id="branch" type="text" class="form-control required">
                                            </div>

                                            <div class="form-group">
                                                <label  class="control-label">Account Name *</label>
                                                <input value="{{$studentinfo[0]['account_name']}}" name="account_name" id="account_name" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Account Number *</label>
                                                <input value="{{$studentinfo[0]['account_no']}}" name="account_number" id="account_number" type="text" class="form-control required">
                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">

                                            <div class="form-group">
                                                <label  class="control-label">SNNIT*</label>
                                                <input value="{{$studentinfo[0]['ssniit']}}"  name="SNNIT"  type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Name of Superannutation fund</label>
                                                <input value="{{$studentinfo[0]['superannutation_name']}}"  name="superannutation_fund" id="superannutation_fund" type="text" class="form-control required">
                                            </div>


                                            <div class="form-group">
                                                <label  class="control-label">Tax Identification Number</label>
                                                <input value="{{$studentinfo[0]['tin']}}"  name="tin" id="tin" type="text" class="form-control required">
                                            </div>

                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>


                    </div>

                    <div class="row pull-right">


                        <input type="submit" class="btn btn-info " value=" Update Student Information
                               " >


                    </div>         
                </form>
            </div>
        </div>
        <!--rightside bar -->
        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->
</aside>

@endsection 

@section('userjs')
<script src="{{ asset('vendors/iCheck/js/icheck.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/custom_js/form_layouts.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/updatestudent.js')}}" type="text/javascript"></script>
@endsection