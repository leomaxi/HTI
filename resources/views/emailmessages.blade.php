
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Emails
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="fa fa-fw ti-home"></i> Emails
                </a>
            </li>

            <li class="active">
                Messages
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- First Basic Table Ends Here-->
        <!-- Second Data Table Starts Here-->

        <div class="">
            <div class="right_aligned" style="margin-bottom: 15px;">
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#newMessageModal">
                    New Message
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class=" fa fa-envelope"></i> Messages
                        </h3>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                    <tr>
                                        <th>Sender</th>
                                        <th>Subject</th>
                                        <th>Date Sent</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ambrose Schulist</td>
                                        <td>Ambrose.Schulist@hotmail.com</td>
                                        <td>June 10 2017</td>
                                        <td>
                                            <p>
                                                <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                        data-target="#edit" data-placement="top"><span
                                                        class="fa fa-fw ti-eye"></span></button>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                        data-target="#delete" data-placement="top"><span
                                                        class="fa fa-fw ti-trash"></span></button>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="Heading">Edit Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control " type="text" placeholder="Joseph Lynch">
                        </div>
                        <div class="form-group">
                            <input class="form-control " type="text" placeholder="joseph34@testmail.com">
                        </div>
                        <div class="form-group">
                            <input class="form-control " type="text" placeholder="456-632-5687">
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-success" data-dismiss="modal">
                            <span class="glyphicon glyphicon-ok-sign"></span> Update
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="Heading5">Delete this entry</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <span class="glyphicon glyphicon-info-sign"></span>&nbsp; Are you sure you want to
                            delete this record ?
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <span class="glyphicon glyphicon-ok-sign"></span> Yes
                        </button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> No
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="newMessageModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(102, 153, 204);">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="Heading">New Message</h4>
                    </div>
                    <form id="sendMessageForm" >
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <span id="holdername"> NB:You can send messages to both individuals and groups.</span>
                            <div class="form-group">
                                <label  for="message">To(individuals):</label>
                                <select name="individuals[]" id="individuals"  class="members form-control multselect select2" multiple style="width: 100%" >
                                    <option value="">Select value...</option>



                                </select>
                            </div>
                            <div class="form-group">
                                <label  for="message">To(groups):</label>
                                <select name="groups[]" id="groups"  class="form-control multselect select2" multiple style="width: 100%" >
                                    <option value="">Select value...</option>



                                </select>
                            </div>
                            <div class="form-group">
                                <label  for="message">Subject:</label>
                                <input class="form-control " type="text" name="subject" required>
                            </div>


                            <div class="form-group">
                                <label  for="message">Message</label>
                                <textarea class="form-control resize_vertical m-t-10" name="message" placeholder="Message" rows="6" id="message" ></textarea>
                            </div>

                            <div class="form-group">
                                <label  for="message">Files</label>
                                <input class="form-control " type="file" name="files[]" multiple>
                            </div>

                            <!--                        <div class="form-group">
                                                        <label  for="message">File:</label>
                                                        <input class="form-control " type="file" name="file" required>
                                                    </div>-->

                        </div>
               
                    <div class="modal-footer ">
                        <input type="submit" class="btn btn-success" value="Send Message"/>
<!--                            <span class="glyphicon glyphicon-ok-sign"></span> Send Message
                        </button>-->
                    </div>
                             </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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
<script src="{{ asset('vendors/toastr/js/toastr.min.js')}}"></script>
<script src="{{ asset('js/emailmessages.js')}}" type="text/javascript"></script>


@endsection