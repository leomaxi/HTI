
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Email Groups
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> Emails
                </a>
            </li>

            <li class="active">
                Email Groups
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <?php
        $groupsArr = json_decode($groups, true);
        ?>
        <div class="">
            <div class="right_aligned" style="margin-bottom: 15px;">
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#userModal">
                    New Group
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="ti-layout-grid3"></i> Email Groups
                        </h3>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="emailgroupTbl">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($groupsArr as $value) {
                                        echo '<tr>'
                                        . '<td>' . $value['name'] . '</td>'
                                                 . '<td><button onclick=""  class="btn btn-outline-success btn-sm editBtn" type="button">View</button></td>'
                                       
                                        . '<td><button onclick=""  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button></td>'
                                        . '<td><button onclick="" class="btn btn-outline-danger btn-sm editBtn" type="button">Delete</button></td>'
                                        . '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="userModal" class="modal fade animated" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">New Email Group</h4>
                    </div>
                    <form role="form" id="saveEmailGroupForm">
                        <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                        <div class="modal-body">
                            <div class="row ">



                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="first-name">Group Name</label>
                                        <input type="text" name="groupname"
                                               required class="form-control ">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="first-name">Members</label>
                                        <select name="members[]" id="members"  class="form-control multselect select2" multiple style="width: 100%" required>
                                            <option value="">Select value...</option>



                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Submit</button>


                        </div>
                    </form>
                </div>
            </div>
        </div>

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

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Update </h4>
                    </div>
                    <form id="updateUserGroupForm" >
                        <div class="modal-body">
                            <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                            <div class="form-group">
                                <label for="region" class="control-label">Name:</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>

                            <input type="hidden" class="form-control" name="code" id="usergroupid">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
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
<script src="{{ asset('js/emailgroup.js')}}" type="text/javascript"></script>

@endsection