<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">


        <meta name="_token" content="{{ csrf_token() }}">

        <title>MOH</title>
        <link type="text/css" href="{{ asset('css/app.css')}}" rel="stylesheet"/>
        <!-- end of global css -->
        <!--page level css -->
        <link href="{{ asset('vendors/select2/css/select2.min.css')}}" type="text/css" rel="stylesheet">
        <link href="{{ asset('vendors/select2/css/select2-bootstrap.css')}}" rel="stylesheet">
        <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" rel="stylesheet">
        <link href="{{ asset('vendors/iCheck/css/all.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}">
        <link href="{{ asset('css/custom_css/wizard.css')}}" rel="stylesheet">
        <!--end of page level css-->
        <link rel="stylesheet" href="{{ asset('vendors/datetime/css/jquery.datetimepicker.css')}}">
        <link href="{{ asset('vendors/airdatepicker/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert2/css/sweetalert2.min.css')}}"/>

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
        <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
        <!-- end of global js -->
        <!-- begining of page level js -->
        <script src="{{ asset('vendors/iCheck/js/icheck.js')}}"></script>
        <script src="{{ asset('vendors/moment/js/moment.min.js')}}"></script>
        <script src="{{ asset('vendors/select2/js/select2.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/bootstrapwizard/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
<!--        <script src="js/custom_js/form_wizards.js')}}" type="text/javascript"></script>-->
        <!-- end of page level js -->
        <script src="{{ asset('vendors/moment/js/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/datetime/js/jquery.datetimepicker.full.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/airdatepicker/js/datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('vendors/airdatepicker/js/datepicker.en.js')}}" type="text/javascript"></script>
<!--        <script src="js/custom_js/advanceddate_pickers.js')}}"></script>
        <script src="js/custom_js/custom_elements.js')}}"></script>-->   
        <script type="text/javascript" src="{{ asset('vendors/sweetalert2/js/sweetalert2.min.js')}}"></script>


        @yield('userjs')

    </body>
</html>