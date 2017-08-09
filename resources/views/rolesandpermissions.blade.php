@extends('layouts.forms')

@section('content')




<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Assign Permissions
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> Account
                </a>
            </li>

            <li class="active">
                Assign  Permissions
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form method="POST" id="assignPermissionsForm">
            <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

            <div class="row">
                <div class="form-group col-lg-6">
                    <label  class=control-label">UserGroups </label>

                    <select id="usergroups" name="usergroups" class="form-control select2" style="width:100%">
                        <option value="">Select value...</option>


                    </select>
                </div>
            </div>
            <div class="row">
                <div class="pull-right">
                    <div class="right_aligned" style="margin-bottom: 15px;">
                        <button type="button" class="btn btn-info " id="assign_all">
                            Assign all
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="panel ">

                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="ti-layout-grid3"></i> Permissions
                            </h3>

                        </div>
                        <div class="panel-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th></th>
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

            <div class="col-xs-12 ">
                <div class="col-sm-offset-3 col-sm-6 col-md-offset-6 col-md-6">

                    <button class="btn btn-primary  btn-block pull-right" id="saveBtn"  type="submit">Save</button>
                </div>
            </div>

        </form>
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="deleteUserGroupForm">
                        <div class="modal-body">
                            <div>
                                <p>
                                    Are you sure you want to delete.?<span class="holder" id="nameholder"></span>

                                </p>
                            </div>
                            <input type="hidden" id="code" name="code"/>
                            <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <button type="submit"  class="btn btn-primary">YES</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->
</aside>

@endsection 

@section('userjs')
<script type="text/javascript" src="{{asset('js/account.js')}}"></script>

@endsection 