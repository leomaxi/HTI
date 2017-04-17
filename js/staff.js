/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $('#dateofbirth').datepicker();

    $('#appointment_date').datepicker();

    $('#startdate').datepicker();
    $('#enddate').datepicker();


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
            root_wizard.find('.finish').click(function () {
                var $validator = $('#staffForm').data('bootstrapValidator').validate();
                if ($validator.isValid()) {
                    
                    console.log('send data to server');
                    $('#myModal').modal('show');
                    return $validator.isValid();
                    root_wizard.find("a[href='#tab1']").tab('show');
                }
            });

        }
    });
    $('#myModal').on('hide.bs.modal', function (e) {
        location.reload();
    });

});
