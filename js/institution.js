/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 $('#establishment_date').datepicker({
        dateFormat: 'dd-mm-yyyy' 
    });


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


var deptinfo = {
    type: "retreiveInstitutionTypes"
};

$.ajax({
    url: 'controllers/ConfigurationController.php',
    type: "GET",
    data: deptinfo,
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('#institution_types').append($('<option>', {
                value: item.code,
                text: item.name
            }));
        });

    }
});



function getDistrictsBasedOnRegion(region_code) {

//    region_code = region_code.split('-');
//    var code = region_code[1];
    console.log(region_code);
    var infotype = {
        type: 'retreiveDistrictsBasedOnRegion',
        region_code: region_code
    };

    $.ajax({
        url: 'controllers/ConfigurationController.php?_=' + new Date().getTime(),
        type: "GET",
        data: infotype,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#district').select2("destroy");
            $('#district').empty();

            $('#district').select2();
            $('#district').append('<option value = ""> Choose... </option>');


            $.each(data, function (i, item) {

                $('#district').append($('<option>', {
                    value: item.district_code,
                    text: item.district_name
                }));
            });


        }
    });
}



$("#region").change(function () {

    var region_code = this.value;
    console.log(region_code);

    getDistrictsBasedOnRegion(region_code);
});

$('#institutionForm').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    console.log(formData);
    //$('input:submit').attr("disabled", true);
//$("#loaderModal").modal('show');

    $.ajax({
        url: 'controllers/instituitionController.php?_=' + new Date().getTime(),
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function (data) {
            $('input:submit').attr("disabled", false);
            console.log(data);
            $("#loaderModal").modal('hide');

            var successStatus = data.success;
            console.log(successStatus);
            document.getElementById("institutionForm").reset();

            $('#district').select2("destroy");
            $('#district').empty();
            $('#district').select2();
            $('#district').append('<option value = ""> Loading... </option>');

            $('#region').select2("destroy");
            $('#region').select2();

            $('#institution_types').select2("destroy");
            $('#institution_types').select2();


            if (successStatus == 1) {
                //  window.location = "http://yoursite.com/page?variable=" + parameter;

                new PNotify({
                    title: 'Success',
                    text: 'Institution Information Saved.Click continue to add principal Information?',
                    icon: 'fa fa-check',
                    type: 'success',
                    hide: false,
                    confirm: {
                        confirm: true,
                        buttons: [
                            {
                                text: 'Continue',
                                click: function (notice) {
                                    //direct to staff information
                                    //  alert('direct to staff');
                                    window.location = 'new-staff.php?institute_code='+data.code;

                                }
                            }
                        ]
                    },
                    buttons: {
                        closer: false,
                        sticker: false
                    },
                    history: {
                        history: false
                    },
                    addclass: 'stack-modal',
                    stack: {'dir1': 'down', 'dir2': 'right', 'modal': true}
                }).on('pnotify.cancel', function () {
                    window.location = 'new-staff.php?institute_code=' + name;

                });

            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });


});

