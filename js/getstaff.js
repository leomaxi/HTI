/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var datatable = $('#staffTbl').DataTable();
datatable
        .column('7:visible')
        .order('desc')
        .draw();
getStaff();
function getStaff()
{

    var info = {
        type: "getstaff"
    };
    $.ajax({
        url: 'controllers/staffController.php?_=' + new Date().getTime(),
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
                    var name =value.firstname + ' ' + value.middlename + ' ' + value.surname;
                    var j = -1;
                    var r = new Array();
                    r[++j] = '<td>' + value.institute_name + '</td>';

                    r[++j] = '<td>' + value.staff_no + '</td>';
                    r[++j] = '<td> ' + value.firstname + ' ' + value.middlename + ' ' + value.surname + '</td>';
                    r[++j] = '<td>' + value.gender + '</td>';
                    r[++j] = '<td>' + value.email_address + '</td>';
                    r[++j] = '<td>' + value.contact_no + '</td>';
                    r[++j] = '<td>' + value.current_appointment_date + '</td>';
                    r[++j] = '<td>' + value.datecreated + '</td>';
                    r[++j] = '<td><button type="button" onclick="editBeneficiary(\'' + value.code + '\')" class="btn btn-outline-info btn-sm  col-sm-6 btn-edit editBtn" ><i class="fa fa-edit""></i><span class="hidden-md hidden-sm hidden-xs"> </span></</button>\n\
                              <button onclick="deleteStaff(\'' + value.code + '\',\'' + name + '\')" class="btn btn-outline-danger btn-sm  col-sm-6  deleteBtn"  type="button"><i class="fa fa-trash-o""></i><span class="hidden-md hidden-sm hidden-xs"> </span></</button></td>';


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

//deleteStaff
function deleteStaff(code, title) {
    console.log(code + title + 'aaaaa');
    $('#code').val(code);
    $('#nameholder').html(title);
    $('#confirmModal').modal('show');
}

$('#deleteStaffForm').on('submit', function (e) {
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
            document.getElementById("deleteStaffForm").reset();

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
                getStaff();
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

});
