/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var datatable = $('#staffTbl').DataTable();

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
                    var j = -1;
                    var r = new Array();
                    r[++j] = '<td>' + value.instituition_code + '</td>';

                    r[++j] = '<td>' + value.staff_no + '</td>';
                    r[++j] = '<td> ' + value.firstname + ' ' + value.middlename + ' ' + value.surname + '</td>';
                    r[++j] = '<td>' + value.gender + '</td>';
                    r[++j] = '<td>' + value.email_address + '</td>';
                    r[++j] = '<td>' + value.contact_no + '</td>';
                    r[++j] = '<td>' + value.current_appointment_date + '</td>';


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

