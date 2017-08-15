
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Institutions
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="fa fa-fw ti-home"></i> Configurations
                </a>
            </li>

            <li class="active">
                Institutions
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="ti-layout-grid3"></i> Institutions
                        </h3>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="instituitionsTbl">
                                <thead>
                                    <tr>
                                        <th>
                                            Code
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>Date Of Establishment</th>
                                        <th>Principal</th>

                                        <th>Location</th>
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

        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->
</aside>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Update Institution Information</h4>
            </div>
            <form id="updateinstitutionForm" class="form-horizontal" role="form">
                <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                <input type="hidden" class="form-control" name="institute_id" id="institute_id" required >
                <div class="modal-body">

                    <div class="form-group">
                        <label for="input-text" class="col-sm-3 control-label"> Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" readonly="true" name="code" id="code" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Institution Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="institution_name" id="institution_name" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-3 control-label">
                            Date Of Establishment
                        </label>
                        <div class="col-sm-9">
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
                        <label  class="col-sm-3 control-label">Principal Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" readonly name="principal_name" id="principal_names" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-3 control-label">New Principal</label>
                        <div class="col-sm-9">
                            <select id="staff" name="principal" class="form-control" style="width:100%">
                                <option value="">Choose..</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Institution Types</label>
                        <div class="col-sm-9">
                            <select name="institution_types[]" id="institution_types"  class="form-control multselect select2" multiple style="width: 100%" required>


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
                        <label  class="col-sm-3 control-label">Region</label>
                        <div class="col-sm-9">
                            <select id="region" name="region" class="form-control" style="width:100%">

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label  class="col-sm-3 control-label">District</label>
                        <div class="col-sm-9">
                            <select id="district" name="district" class="form-control " style="width:100%">

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Location</label>
                        <div class="col-sm-9">
                            <input type="text" name="location" id="location" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Latitude</label>
                        <div class="col-sm-9">
                            <input type="text" id="latitude" name="latitude" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Longitude</label>
                        <div class="col-sm-9">
                            <input type="text" id="longitude" name="longitude" class="form-control" />
                        </div>
                    </div>





                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <input type="submit" name="submit" class="btn btn-info"  value="Update"/>


                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="deleteInstitutionForm">
                <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                <div class="modal-body">
                    <div>
                        <p>
                            Are you sure you want to delete this institutions?.<span class="holder" id="beneficiaryholder"></span> 
                        </p>
                    </div>
                    <input type="hidden" id="code" name="code"/>
                    <input type="hidden"  name="type" value="deleteInstitution"/>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" id="deleteBeneficiary" class="btn btn-primary">YES</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection 

@section('userjs')
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/custom_js/datatables_custom.js')}}"></script>
<script src="{{ asset('js/getinstitution.js')}}" type="text/javascript"></script>

@endsection