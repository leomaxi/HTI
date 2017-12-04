
@extends('layouts.master')

@section('content')


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Compose New Message
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="fa fa-fw ti-home"></i> Emails
                </a>
            </li>

            <li class="active">
                Compose New Message
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- First Basic Table Ends Here-->
        <!-- Second Data Table Starts Here-->


        <div class="row">
            <div class="col-lg-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class=" fa fa-envelope"></i> New Message
                        </h3>

                    </div>
                    <div class="panel-body">
                        <form id="sendMessageForm" >
                            {{ csrf_field() }}
                          
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

                      

                            <div class="row pull-right">
                                <input type="submit" class="btn btn-success" value="Send Message"/>
        <!--                            <span class="glyphicon glyphicon-ok-sign"></span> Send Message
                                </button>-->
                            </div>
                        </form>



                    </div>
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
<script src="{{ asset('vendors/toastr/js/toastr.min.js')}}"></script>
<script src="{{ asset('js/emailmessages.js')}}" type="text/javascript"></script>


@endsection