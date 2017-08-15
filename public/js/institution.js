/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('#establishment_date').datepicker({
    dateFormat: 'dd-mm-yyyy'
});

$('.select2').select2();


$.ajax({
    url: 'getregions',
    type: "GET",
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('#region').append($('<option>', {
                value: item.code,
                text: item.name + ' Region'
            }));
        });

    }
});



$.ajax({
    url: 'getinstituitionstypes',
    type: "GET",
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

//professional_bodies

$.ajax({
    url: 'getprofessionalbodies',
    type: "GET",
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('#professional_bodies').append($('<option>', {
                value: item.code,
                text: item.name
            }));
        });

    }
});

function getDistrictsBasedOnRegion(region_code) {


    console.log(region_code);


    $.ajax({
        url: 'getdistrictsonregioncode/' + region_code,
        type: "GET",
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
    $('input:submit').attr("disabled", true);
    $("#loaderModal").modal('show');

    $.ajax({
        url: 'instituite',
        type: "POST",
        data: formData,
        success: function (data) {
            $('input:submit').attr("disabled", false);
            console.log(data);
            $("#loaderModal").modal('hide');

            var successStatus = data.success;
            console.log(successStatus);

            if (data == "error") {
                swal("Error!", "Couldnt Save", "error");
            } else if (data == "exists") {
                swal("Error!", "Couldnt save:Instituition code already exist", "error");

            } else {
                document.getElementById("institutionForm").reset();

                $('#district').select2("destroy");
                $('#district').empty();
                $('#district').select2();
                $('#district').append('<option value = ""> Loading... </option>');

                $('#region').select2("destroy");
                $('#region').select2();

                $('#institution_types').select2("destroy");
                $('#institution_types').select2();

                swal({
                    title: "Success",
                    text: "Institution Information Saved.Click continue to add principal Information?",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonText: "Continue",
                }).then(
                        function () {
                            window.location = '../staff/new/' + data;

                        });
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            $('input:submit').attr("disabled", false);
            $("#loaderModal").modal('hide');
            swal("Error!", "Couldnt save:Contact System Administrator", "error");

        }
    });


});

