/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('#establishment_date').datepicker({
    dateFormat: 'dd-mm-yyyy'
});
//
$('#update_establishment_date').datepicker({
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
                text: item.name
            }));
        });

    }
});

$.ajax({
    url: 'getdistricts',
    type: "GET",
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('#district').append($('<option>', {
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



var datatable = $('#instituitionsTbl').DataTable();

getinstitutions();
function getinstitutions()
{


    $.ajax({
        url: 'getinstitutions',
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);

            datatable.clear().draw();
            // var obj = jQuery.parseJSON(data);
            if (data.length == 0) {
                console.log("NO DATA!");
            } else {

                var rowNum = 0;
                $.each(data, function (key, value) {
                    var j = -1;
                    var r = new Array();
                    r[++j] = '<td>' + value.code + '</td>';
                    r[++j] = '<td> ' + value.name + '</td>';
                    r[++j] = '<td>' + value.date_of_establishment + '</td>';
                    r[++j] = '<td>' + value.principal_name + '</td>';
                    r[++j] = '<td>' + value.location + '</td>';

                    r[++j] = '<td><button type="button" onclick="editInstitution(\'' + value.id + '\')" class="btn btn-outline-info btn-sm  col-sm-6 btn-edit editBtn" ><i class="fa fa-edit""></i><span class="hidden-md hidden-sm hidden-xs"> </span></</button>\n\
                              <button onclick="deleteInstituition(\'' + value.id + '\',\'' + value.name + '\')" class="btn btn-outline-danger btn-sm  col-sm-6  deleteBtn"  type="button"><i class="fa fa-trash-o""></i><span class="hidden-md hidden-sm hidden-xs"> </span></</button></td>';

                    rowNum = rowNum + 1;


                    rowNode = datatable.row.add(r);
                });

                rowNode.draw().node();
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

}

function editInstitution(code) {
    console.log(code + 'aaaaa');
    $.ajax({
        url: 'institution/' + code,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#code').val(data.code);
            $('#institution_name').val(data.name);
            $('#establishment_date').val(data.date_of_establishment);
            $('#region').val(data.region).attr("selected", "selected");

            $('#district').val(data.district).attr("selected", "selected");
            $('#location').val(data.location);
            $('#longitude').val(data.longitude);
            $('#latitude').val(data.latitude);

            $('#editModal').modal('show');
        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

}

function deleteInstituition(code, title) {
    console.log(code + title + 'aaaaa');
    $('#code').val(code);
    $('#beneficiaryholder').html(title);
    $('#confirmModal').modal('show');
}


$('#deleteInstitutionForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    var code = $('#code').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');


    $.ajax({
        url: 'institution/' + code,
        type: "DELETE",
        data: {_token: token},
        // dataType: "json",
        success: function (data) {
            console.log('response data' + data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteInstitutionForm").reset();

            if (data == 0) {
                swal("Success!", "Information Deleted Successfully", "success");
                getinstitutions();
            } else {
                swal("Error!", "Couldnt Delete", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

});
