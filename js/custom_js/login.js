"use strict";
$(document).ready(function () {
    //=================Preloader===========//
    $(window).on('load', function () {
        $('.preloader img').fadeOut();
        $('.preloader').fadeOut();
    });
    //=================end of Preloader===========//
    $('input').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue',
        increaseArea: '20%' // optional
    });
//    $("#loginForm").bootstrapValidator({
//        fields: {
//            username: {
//                validators: {
//                    notEmpty: {
//                        message: 'The email address is required'
//                    },
//                    regexp: {
//                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
//                        message: 'Please enter valid email format'
//                    }
//                },
//                required: true
//            },
//            password: {
//                validators: {
//                    notEmpty: {
//                        message: 'Password is required'
//                    }
//
//                },
//                required: true
//
//            }
//
//        }
//    });

//    $('.sign_in').click(function () {
//        var $validator = $('#loginForm').data('bootstrapValidator').validate();
//        if ($validator.isValid()) {
//        }
//    });



    $('#loginForm').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();
        console.log(formData);

        $('input:submit').attr("disabled", true);

        $.ajax({
            url: 'controllers/AccountController.php?_=' + new Date().getTime(),
            type: "POST",
            data: formData,
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                var successStatus = data.success;
                var firstlogin = data.login;
                $('input:submit').attr("disabled", false);

                if (successStatus == 0) {

                    if (firstlogin === "YES") {
//enforce password
                        console.log('enforce password');
                        $('#fill_modal').modal('show');
                    } else {
//send to dashboard
                        window.location = "dashboard.php";

                    }
                }

            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });

    });



    $('#changePasswordForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }

                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    })
            .on('success.form.bv', function (e) {
                $('input:submit').attr("disabled", false);

                // Prevent form submission
                e.preventDefault();
                // Get the form instance
                var $form = $(e.target);
                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                console.log($form.serialize());

                $.ajax({
                    url: 'controllers/AccountController.php?_=' + new Date().getTime(),
                    type: "POST",
                    data: $form.serialize(),
                    dataType: "JSON",
                    success: function (data) {
                        console.log(data);
                        var successStatus = data.success;
                        $('input:submit').attr("disabled", false);

                        if (successStatus == 0) {

                            //let user login with password 
                            swal({
                                title: "Success",
                                text: "Password Changed Successfully.Kindly login with new password",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonText: "OK",
                                closeOnConfirm: false
                            },
                            function () {
                                window.location = "index.php";
                            });
                        }

                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });

            });

});
