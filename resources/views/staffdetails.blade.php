
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            {{$staffinfo[0]['firstname'].' '.$staffinfo[0]['surname']}} Information
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
        <!--        {{$staffinfo}}
                {{$employmentinfo}}
                {{$academicinfo}}
                {{$bankinfo}}-->

        <div class="row">
            <div class="col-lg-12">
                <form id="updateStaffInfo" method='post'>
                    <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

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
                                        Academic Details
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab">
                                        Employment Details
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab4" data-toggle="tab">
                                        Next Of KIn
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab5" data-toggle="tab">
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

                                            <input   name="code" type="hidden" value="{{$staffinfo[0]['code']}}" class="form-control required">
                                            <input   name="staffno" type="hidden" value="{{$staffinfo[0]['staff_no']}}" class="form-control required">
                                            <input type="hidden" id="regioncode" value="{{$staffinfo[0]['region']}}"/>
                                            <div class="form-group">
                                                <label class="control-label">First Name *</label>
                                                <input id="firstname"  name="firstname" type="text" value="{{$staffinfo[0]['firstname']}}" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Middle Name </label>
                                                <input id="middlename" name="middlename" 
                                                       type="text" class="form-control required " value="{{$staffinfo[0]['middlename']}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Last Name *</label>
                                                <input id="lastname" name="lastname" type="text"
                                                       value="{{$staffinfo[0]['surname']}}"   class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label class=control-label">Gender *</label>

                                                <select id="gender" name="gender" class="form-control select2" style="width:100%">

                                                    <option value="" <?php if ($staffinfo[0]['gender'] == "") echo 'selected="selected"'; ?> >Select value...</option>

                                                    <option value="male" <?php if ($staffinfo[0]['gender'] == "male") echo 'selected="selected"'; ?>>Male</option>
                                                    <option value="female" <?php if ($staffinfo[0]['gender'] == "female") echo 'selected="selected"'; ?>>Female</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label  class="control-label">Date Of BIrth  *</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-fw ti-calendar"></i>
                                                    </div>
                                                    <input type="text"  value="{{$staffinfo[0]['dob']}}"  class="form-control pull-right" name="dateofbirth" data-language='en' id="dateofbirth" />
                                                </div> 
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Place of Birth  </label>
                                                <input id="placeofbirth" name="placeofbirth"  value="{{$staffinfo[0]['place_of_birth']}}" type="text"

                                                       class="form-control ">
                                            </div>        
                                            <div class="form-group">
                                                <label class="control-label">Region Name</label>
                                                <input readonly  name="region_name" value="{{$staffinfo[0]['region_name']}}" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class=control-label">New Region </label>

                                                <select  id="region" name="region" class="form-control select2" style="width:100%">
                                                    <option value="">Select value...</option>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label  class="control-label">Nationality  *</label>
                                                <input id="nationality" name="nationality" value="{{$staffinfo[0]['nationality']}}" type="text" class="form-control required">
                                            </div>   

                                            <div class="form-group">
                                                <label  class=control-label">Address *</label>

                                                <textarea name="address"rows="5"   style="width: 100%" >
                                                {{$staffinfo[0]['address']}}
                                                </textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="confirm" class="control-label">Suburb  *</label>
                                                <input id="suburb" name="suburb" value="{{$staffinfo[0]['suburb']}}" type="text" class="form-control required">

                                            </div>

                                            <div class="form-group">
                                                <label  class=control-label">Marital Status </label>

                                                <select id="marital_status" name="marital_status" class="form-control select2" style="width:100%">
                                                    <option value="" <?php if ($staffinfo[0]['marital_status'] == "") echo 'selected="selected"'; ?>>Select value...</option>

                                                    <option value="single" <?php if ($staffinfo[0]['marital_status'] == "single") echo 'selected="selected"'; ?>>Single</option>
                                                    <option value="married" <?php if ($staffinfo[0]['marital_status'] == "married") echo 'selected="selected"'; ?>>Married</option>
                                                    <option value="divorced" <?php if ($staffinfo[0]['marital_status'] == "divorced") echo 'selected="selected"'; ?>>Divorced</option>
                                                    <option value="widow" <?php if ($staffinfo[0]['marital_status'] == "widow") echo 'selected="selected"'; ?>>Widow</option>
                                                    <option value="widower" <?php if ($staffinfo[0]['marital_status'] == "widower") echo 'selected="selected"'; ?>>Widower</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Staff No *</label>
                                                <input id="staffno" name="staffno" disabled value="{{$staffinfo[0]['staff_no']}}"  type="text"
                                                       class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Postal Address *</label>
                                                <input id="postal_address" name="postal_address" value="{{$staffinfo[0]['postcode']}}"  type="text"
                                                       class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Contact No *</label>
                                                <input id="contactno" name="contactno" value="{{$staffinfo[0]['contact_no']}}"
                                                       type="text" class="form-control required ">
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="control-label">Email Address *</label>
                                                <input id="email" name="email" value="{{$staffinfo[0]['email_address']}}" type="email"
                                                       class="form-control required email">
                                            </div>

                                            <div class="form-group">
                                                <label for="confirm" class="control-label">Identification Type  </label>
                                                <select id="identification_type" name="identification_type" class="form-control select2" style="width:100%">
                                                    <option value="">Select value...</option>

                                                    <option value="NHIS"  <?php if ($staffinfo[0]['identification_type'] == "NHIS") echo 'selected="selected"'; ?>>NHIS</option>
                                                    <option value="Voters IDCard"  <?php if ($staffinfo[0]['identification_type'] == "Voters IDCard") echo 'selected="selected"'; ?>>Voters IDCard</option>
                                                    <option value="Drivers License"  <?php if ($staffinfo[0]['identification_type'] == "Drivers License") echo 'selected="selected"'; ?>>Drivers License</option>
                                                    <option value="Passport"  <?php if ($staffinfo[0]['identification_type'] == "Passport") echo 'selected="selected"'; ?>>Passport</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm" class="control-label">Identification Number  </label>
                                                <input id="identification_number" value="{{$staffinfo[0]['identification_number']}}" name="identification_number" 
                                                       type="text" class="form-control required ">
                                            </div>        



                                            <div class="form-group">
                                                <label for="confirm" class="control-label">Highest Qualification  *</label>
                                                <input id="highest_qualification" name="highest_qualification" value="{{$staffinfo[0]['postcode']}}"
                                                       type="text" class="form-control required ">
                                            </div>   



                                            <div class="form-group">
                                                <label for="confirm" class="control-label">Current Appointment Date  *</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-fw ti-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right" value="{{$staffinfo[0]['current_appointment_date']}}" name="appointment_date" data-language='en' id="appointment_date" />
                                                </div> 
                                            </div>


                                            <div class="form-group">
                                                <label for="confirm" class="control-label">Number Of Years  </label>
                                                <input id="numberofyears" value="{{$staffinfo[0]['years']}}" name="numberofyears" 
                                                       type="number" class="form-control  ">
                                            </div>


                                            <div class="form-group">
                                                <label for="confirm" class="control-label">Area of Expertise  </label>
                                                <textarea rows="5"  name="areaofexpertise" id="areaofexpertise" style="width: 100%" >
                                                {{$staffinfo[0]['area_of_expertise']}}
                                                </textarea>

                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Department Name</label>
                                                <input readonly  name="department_name" value="{{$staffinfo[0]['department_name']}}" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class=control-label">New Department *</label>

                                                <select id="department" name="department" class="form-control select2" style="width:100%">
                                                    <option value="">Select value...</option>

                                                </select>
                                            </div>





                                        </div>


                                    </div>

                                </div>
                                <div id="tab2" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Last Institution Complete </label>
                                                <input  name="last_institution_completed" value="{{$academicinfo[0]['last_institution_completed']}}" name="last_institution_completed" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Program Of Study </label>
                                                <input  name="programofstudy"  value="{{$academicinfo[0]['program']}}" id="programofstudy" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Year  of Completion </label>
                                                <input  name="completion_year"  value="{{$academicinfo[0]['completion_year']}}" id="completion_year" type="text" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label  class="control-label">Certificate Type </label>
                                                <input  name="certificate_type"  value="{{$academicinfo[0]['certificate_type']}}" id="certificate_type" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Professional Body </label>
                                                <input  name="professional_body"  value="{{$academicinfo[0]['professional_body']}}" id="professional_body" type="text" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Professional Id </label>
                                                <input  name="professional_id"  value="{{$academicinfo[0]['professional_id']}}" id="professional_id" type="text" class="form-control ">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="tab3" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label  class="control-label">Start Date *</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-fw ti-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right" value="{{$employmentinfo[0]['start_date']}}" name="startdate" data-language='en' id="startdate" />
                                                </div> 
                                            </div>
                                            <div class="form-group">
                                                <label for="userName" class="control-label">End Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-fw ti-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right" value="{{$employmentinfo[0]['end_date']}}" name="enddate" data-language='en' id="enddate" />
                                                </div> 
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Qualification *</label>
                                                <input  name="qualification" id="qualification" value="{{$employmentinfo[0]['qualification']}}" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Staff Class *</label>
                                                <input  name="staff_class" type="text" value="{{$employmentinfo[0]['staff_class']}}" id="staff_class" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label  class="control-label">Grade Type</label>
                                                <input  name="gradetype" readonly  value="{{$employmentinfo[0]['gradetype']}}" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="userName" class="control-label">New Grade </label>

                                                <select id="grade" name="grade" class="form-control select2" style="width:100%">
                                                    <option value="" selected>Select value...</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Staff Id *</label>
                                                <input  name="staffid" id="staffid" value="{{$employmentinfo[0]['staffid']}}" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Employment Type </label>
                                                <input  name="employment_type" value="{{$employmentinfo[0]['employment_type']}}" id="employment_type" type="text" class="form-control ">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="tab4" class="tab-pane fade">

                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label  class="control-label">Next of Kin </label>
                                                <input  name="nextofkin" id="nextofkin" value="{{$staffinfo[0]['next_of_kin']}}" type="text" class="form-control required"/>
                                            </div>
                                            <div class="form-group">
                                                <label  class=control-label">Relationship </label>

                                                <select id="kin_relationship" name="kin_relationship" class="form-control select2" style="width:100%">
                                                    <option value="">Select value...</option>
                                                    <option value="Brother" <?php if ($staffinfo[0]['relationship'] == "Brother") echo 'selected="selected"'; ?>>Brother</option>
                                                    <option value="Sister" <?php if ($staffinfo[0]['relationship'] == "Sister") echo 'selected="selected"'; ?>>Sister</option>
                                                    <option value="Daughter" <?php if ($staffinfo[0]['relationship'] == "Daughter") echo 'selected="selected"'; ?>>Daughter</option>
                                                    <option value="Son" <?php if ($staffinfo[0]['relationship'] == "Son") echo 'selected="selected"'; ?>>Son</option>
                                                    <option value="Mother" <?php if ($staffinfo[0]['relationship'] == "Mother") echo 'selected="selected"'; ?>>Mother</option>
                                                    <option value="Father" <?php if ($staffinfo[0]['relationship'] == "Father") echo 'selected="selected"'; ?>>Father</option>
                                                    <option value="Husband" <?php if ($staffinfo[0]['relationship'] == "Husband") echo 'selected="selected"'; ?>>Husband</option>
                                                    <option value="Wife" <?php if ($staffinfo[0]['relationship'] == "Wife") echo 'selected="selected"'; ?>>Wife</option>


                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="userName" class="control-label">Address </label>
                                                <textarea rows="5" name="kin_address"  value="{{$staffinfo[0]['kin_address']}}" id="kin_address" style="width: 100%" ></textarea>

                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Suburb </label>
                                                <input  name="kin_suburb" id="kin_suburb" value="{{$staffinfo[0]['professional_id']}}" type="text" class="form-control required">
                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label  class="control-label">Email Address </label>
                                                <input  name="kin_email" id="kin_email" value="{{$staffinfo[0]['kin_email']}}" type="email" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Contact No </label>
                                                <input  name="kin_contactno" id="kin_contactno"  value="{{$staffinfo[0]['kin_contactno']}}" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Postal Address </label>
                                                <input  name="kin_postal" id="kin_postal" value="{{$staffinfo[0]['kin_postcode']}}" type="text" class="form-control required">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="tab5" class="tab-pane fade">


                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label  class="control-label">Bank Name *</label>
                                                <input  name="bank_name" id="bank_name" value="{{$bankinfo[0]['bank']}}" type="text" class="form-control required">
                                            </div>

                                            <div class="form-group">
                                                <label  class="control-label">Account Name *</label>
                                                <input  name="account_name" id="account_name" value="{{$bankinfo[0]['account_name']}}" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Account Number *</label>
                                                <input  name="account_number" id="account_number" value="{{$bankinfo[0]['account_number']}}" type="text" class="form-control required">
                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label  class="control-label">Branch *</label>
                                                <input  name="branch" id="branch" type="text" value="{{$bankinfo[0]['branch']}}" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label">Tin*</label>
                                                <input  name="tin" id="tin" type="text" value="{{$bankinfo[0]['tin']}}" class="form-control required">
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>


                    </div>

                    <div class="row pull-right">


                        <input type="submit" class="btn btn-info " value=" Update Staff Information
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
<script src="{{ asset('js/updatestaff.js')}}" type="text/javascript"></script>
@endsection