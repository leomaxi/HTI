/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {

    var reginfo = {
        type: "retreiveRegion"
    };

    $.ajax({
        url: 'controllers/ConfigurationController.php',
        type: "GET",
        data: reginfo,
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#region').append($('<option>', {
                    value: item.code,
                    text: item.name
                }));
            });

        }
    });


    var info = {
        type: "retreiveDepartments"
    };

    $.ajax({
        url: 'controllers/ConfigurationController.php',
        type: "GET",
        data: info,
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#department').append($('<option>', {
                    value: item.code,
                    text: item.name
                }));
            });

        }
    });


    var reginfo = {
        type: "retreivegradeTypes"
    };

    $.ajax({
        url: 'controllers/ConfigurationController.php',
        type: "GET",
        data: reginfo,
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#grade').append($('<option>', {
                    value: item.code,
                    text: item.name
                }));
            });

        }
    });


    $('#dateofbirth').datepicker({
        dateFormat: 'dd-mm-yy' 

    });

    $('#appointment_date').datepicker({
        dateFormat: 'dd-mm-yy' 
    });
    $('#startdate').datepicker({
        dateFormat: 'dd-mm-yy' 
    });
    
    $('#enddate').datepicker({
        dateFormat: 'dd-mm-yy' 
    });

    $(".select2").select2({
        theme: "bootstrap"
    });



    $("#staffForm").bootstrapValidator({
        fields: {
            firstname: {
                validators: {
                    notEmpty: {
                        message: 'firstname is required'
                    }
                },
                required: true,
                minlength: 3
            },
            passwosrd: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    different: {
                        field: 'first_name,last_name',
                        message: 'Password should not match user Name'
                    }
                }
            },
            confirsm: {
                validators: {
                    notEmpty: {
                        message: 'Confirm Password is required'
                    },
                    identical: {
                        field: 'password'
                    },
                    different: {
                        field: 'first_name,last_name',
                        message: 'Confirm Password should match with password'
                    }
                }
            },
            emsail: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    regexp: {
                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
                        message: 'Please enter valid email format'
                    }
                }
            },
            fnsame: {
                validators: {
                    notEmpty: {
                        message: 'The first name is required '
                    }
                }
            },
            lnasme: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required '
                    }
                }
            },
            passwosrd3: {
                validators: {
                    notEmpty: {
                        message: 'This field is required and mandatory'
                    }
                },
                required: true,
                minlength: 3
            },
            asge: {
                validators: {
                    notEmpty: {},
                    digits: {},
                    greaterThan: {
                        value: 18,
                        message: 'The Age must be greater than or equal to 18'
                    },
                    lessThan: {
                        value: 100,
                        message: 'The Age must be less than or equal to 100'
                    }
                }
            },
            phsone1: {
                validators: {
                    notEmpty: {
                        message: 'The home number is required'
                    },
                    regexp: {
                        regexp: /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/,
                        message: 'Enter valid phone number'
                    }
                }
            },
            phonse2: {
                validators: {
                    notEmpty: {
                        message: 'The personal number is required'
                    },
                    regexp: {
                        regexp: /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/,
                        message: 'Enter valid phone number'
                    }
                }
            },
            phonse3: {
                validators: {
                    notEmpty: {
                        message: 'Alternate number is required'
                    },
                    different: {
                        field: 'phone1',
                        message: 'The alternate number must be different from Home number'
                    },
                    regexp: {
                        regexp: /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/,
                        message: 'Enter valid phone number'
                    }
                }
            },
            acceptTerms: {
                validators: {
                    notEmpty: {
                        message: 'The checkbox must be checked'
                    }
                }
            }
        }
    });




    $('#acceptTerms').on('ifChanged', function (event) {
        $('#staffForm').bootstrapValidator('revalidateField', $('#acceptTerms'));
    });
    $('#rootwizard').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'onNext': function (tab, navigation, index) {
            var $validator = $('#staffForm').data('bootstrapValidator').validate();
            return $validator.isValid();
        },
        onTabClick: function (tab, navigation, index) {
            return false;
        },
        onTabShow: function (tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;

            // If it's the last tab then hide the last button and show the finish instead
            var root_wizard = $('#rootwizard');
            if ($current >= $total) {
                root_wizard.find('.pager .next').hide();
                root_wizard.find('.pager .finish').show();
                root_wizard.find('.pager .finish').removeClass('disabled');
            } else {
                root_wizard.find('.pager .next').show();
                root_wizard.find('.pager .finish').hide();
            }
//            root_wizard.find('.finish').click(function () {
//                var $validator = $('#staffForm').data('bootstrapValidator').validate();
//                return $validator.isValid();
//
//            });



        }


    });

    $('.finish').click(function () {

        var $validator = $('#staffForm').data('bootstrapValidator').validate();
        if ($validator.isValid()) {

            swal({
                title: "Confirm",
                text: "Are you sure you want to submit staff information?",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function () {
                var formData = $("#staffForm").serialize();

                console.log('data: ' + formData);
                console.log('send data to server');
                $.ajax({
                    url: 'controllers/staffController.php',
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if (data.success == 0) {
                            swal("Error", data.message, "danger");


                        } else if (data.type == "principal") {
                            swal({
                                title: "Success",
                                text: "Principal Information Saved Successfully",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonText: "OK",
                                closeOnConfirm: false
                            },
                            function () {
                                window.location = "instituitions.php";
                            });

                        } else {
                            $('#myModal').modal('show');
//                   
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });


            });



//                    $('#myModal').modal('show');
//                   
//                    root_wizard.find("a[href='#tab1']").tab('show');
        }

    });

    $('#myModal').on('hide.bs.modal', function (e) {
        location.reload();
    });

});
