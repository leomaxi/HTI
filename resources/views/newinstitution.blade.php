
@extends('layouts.master')

@section('content')



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
                        <form id="institutionForm" class="form-horizontal " role="form">
                            <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                            <div class="form-group">
                                <label for="input-text" class="col-sm-2 control-label"> Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="code" id="code" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Institution Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="institution_name" id="institution_name" required>
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
                                        <input required type="text" class="form-control pull-right" name="date_established" data-language='en' id="establishment_date" />
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
                                <label  class="col-sm-2 control-label">Professional Bodies</label>
                                <div class="col-sm-10">
                                    <select name="professional_bodies[]" id="professional_bodies"  class="form-control multselect select2" multiple style="width: 100%" required>
                                        <option value="">Select value...</option>



                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Region</label>
                                <div class="col-sm-10">
                                    <select id="region" name="region" class="form-control select2" style="width:100%" required>
                                        <option value="">Select value...</option>



                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label  class="col-sm-2 control-label">District</label>
                                <div class="col-sm-10">
                                    <select id="district" name="district" class="form-control select2" style="width:100%" required>
                                        <option value="">Select value...</option>



                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Location</label>
                                <div class="col-sm-10">
                                    <input type="text" name="location" class="form-control" required />
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

@endsection 

@section('userjs')

<script src="{{ asset('js/institution.js')}}" type="text/javascript"></script>

@endsection