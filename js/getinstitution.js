/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var datatable = $('#instituitionsTbl').DataTable();

getinstitutions();
function getinstitutions()
{

    var info = {
        type: "getinstitutions"
    };
    $.ajax({
        url: 'controllers/instituitionController.php?_=' + new Date().getTime(),
        type: "GET",
        data: info,
        success: function (data) {


            datatable.clear().draw();
            var obj = jQuery.parseJSON(data);
            if (obj.length == 0) {
                console.log("NO DATA!");
            } else {

                var rowNum = 0;
                $.each(obj, function (key, value) {
                    var j = -1;
                    var r = new Array();
                    r[++j] = '<td>' + value.code + '</td>';
                    r[++j] = '<td> ' + value.name + '</td>';
                    r[++j] = '<td>' + value.date_of_establishment + '</td>';
                    r[++j] = '<td>' + value.staff_name + '</td>';
                    r[++j] = '<td>' + value.location + '</td>';

                    r[++j] = '<td><button type="button" onclick="editBeneficiary(\'' + value.code + '\')" class="btn btn-outline-info btn-sm  col-sm-6 btn-edit editBtn" ><i class="fa fa-edit""></i><span class="hidden-md hidden-sm hidden-xs"> </span></</button>\n\
                              <button onclick="deleteInstituition(\'' + value.code + '\',\'' + value.name + '\')" class="btn btn-outline-danger btn-sm  col-sm-6  deleteBtn"  type="button"><i class="fa fa-trash-o""></i><span class="hidden-md hidden-sm hidden-xs"> </span></</button></td>';

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
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'controllers/deleteController.php?_=' + new Date().getTime(),
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
            var successStatus = data.success;
            document.getElementById("deleteInstitutionForm").reset();

            if (successStatus == 1) {
                Command: toastr["success"](data.message, "Success");

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                getinstitutions();
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

});
