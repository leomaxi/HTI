<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">


        <meta name="_token" content="{{ csrf_token() }}">

        <title>MOH</title>
        <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css')}}"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('vendors/iCheck/css/all.css')}}"/>
        <!-- end of global css -->
        <!--page level css -->
        <link rel="stylesheet" href="{{ asset('vendors/swiper/css/swiper.min.css')}}">
        <link href="{{ asset('vendors/nvd3/css/nv.d3.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('vendors/lcswitch/css/lc_switch.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom_css/skins/skin-default.css')}}" type="text/css" id="skin"/>
        <link href="{{asset('css/custom_css/dashboard1.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/custom_css/dashboard1_timeline.css')}}" rel="stylesheet"/>
        <link rel="stylesheet" href="{{asset('vendors/datetime/css/jquery.datetimepicker.css')}}">
        <link href="{{asset('vendors/airdatepicker/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom_css/skins/skin-default.css')}}" type="text/css" id="skin" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/datepicker.css')}}">
        <!--end of page level css-->
        <link href="{{asset('vendors/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('vendors/select2/css/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/toastr_notificatons.css')}}">

        <link rel="stylesheet" type="text/css" href="{{asset('vendors/datatables/css/dataTables.bootstrap.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/datatables_custom.css')}}">
        <!--end of page level css-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert2/css/sweetalert2.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom_css/sweet_alert2.css')}}">
        <!--        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">-->

        <link rel="stylesheet" type="text/css" href="{{asset('css/form_layouts.css')}}">
        <!-- END Custom CSS-->
    </head>
    <body class="skin-default">
        <div class="preloader">
            <div class="loader_img"><img src="{{asset('img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
        </div>
        @include('layouts.header')
        <div class="wrapper row-offcanvas row-offcanvas-left">
            @include('layouts.nav')



            @yield('content')

        </div>

        <div class="modal fade" id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
            <div class="modal-dialog" role="document">


                <div  id="loader" style="margin-top:30% ">
                    <img src="{{ asset('img/load.gif')}}">

                    <span class="loader-text">Filtering Results...</span>
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
                    <form id="updateForm" >
                        <div class="modal-body">
                            <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                            <div class="form-group">
                                <label for="region" class="control-label">Name:</label>
                                <input type="text" class="form-control" name="name" id="updategroupName" required>
                            </div>

                            <input type="hidden" class="form-control" name="code" id="code">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
         <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="deleteForm">
                        <div class="modal-body">
                            <div>
                                <p>
                                    Are you sure you want to delete this email group ?.<span class="holder" id="holdername"></span> 
                                </p>
                               
                            </div>
                            <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                            <input type="hidden" id="deletedid" name="id"/>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <button type="submit"  class="btn btn-primary">YES</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('layouts.footer')
        @yield('dashboard')
        @yield('userjs')

    </body>
</html>