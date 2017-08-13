
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Students
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="fa fa-fw ti-home"></i> Students
                </a>
            </li>

            <li class="active">
                All Students
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
                            <i class="ti-layout-grid3"></i> Students
                        </h3>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="staffTbl">
                                <thead>
                                    <tr>
                                        <th>
                                            Institution
                                        </th>

                                        <th>
                                            Name
                                        </th>
                                        <th>Gender</th>
                                        <th>Email Address</th>
                                        <th>Contact No</th>
                                        <th>Date Created</th>
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

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="deleteStudentForm">
                        <div class="modal-body">
                            <div>
                                <p>
                                    Are you sure you want to delete.?<span class="holder" id="nameholder"></span>

                                </p>
                            </div>
                                                  <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                            <input type="hidden" id="code" name="code"/>
                            <input type="hidden"  name="type" value="updateInformation"/>

                            <input type="hidden" class="form-control" name="tablename" value="students">


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
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/custom_js/datatables_custom.js')}}"></script>
<script src="{{ asset('js/getstudents.js')}}" type="text/javascript"></script>

@endsection