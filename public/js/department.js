/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//save region


$('#saveDepartmentForm').on('submit', function (e) {
    e.preventDefault();
    // var validator = $("#saveRegionForm").validate();
    var formData = $(this).serialize();
    console.log(formData);
    $('input:submit').attr("disabled", true);
    $.ajax({
        url: 'department',
        type: "POST",
        data: formData,
       
        success: function (data) {
            console.log(data);
            $('#departmentModal').modal('hide');
          
            document.getElementById("saveDepartmentForm").reset();
 
           if (data == 0) {
                swal("Success!", "Data Saved Successfully", "success");
                getDepartments();
            } else {
                swal("Error!", "Couldnt save", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
           swal("Error!", "Couldnt save:Duplicate entry,name already exist", "error");
        }
    });




});

//retreive regions

var datatable = $('#departmentTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});

getDepartments();

function getDepartments()
{



    $.ajax({
        url: 'getdepartments',
        type: "GET",
        dataType: "json",
        success: function (data) {

            console.log(data);
            datatable.clear().draw();

            if (data.length == 0) {
                console.log("NO DATA!");
            } else {
                $.each(data, function (key, value) {


                    var j = -1;
                    var r = new Array();
                    // represent columns as array
                    r[++j] = '<td class="subject">' + value.name + '</td>';
                    r[++j] = '<td><button onclick="editDepartment(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
                              <button onclick="deleteDepartment(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

                    rowNode = datatable.row.add(r);
                });

                rowNode.draw().node();
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Error", "error");
        }
    });
}



function deleteDepartment(code, title) {
    console.log(code + title);
    $('#code').val(code);
    $('#nameholder').html(title);
    $('#confirmModal').modal('show');
}

$('#deleteDepartmentForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#code').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'department/'+ code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            $('#loaderModal').modal('hide');
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteDepartmentForm").reset();

            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
                getDepartments();
            } else {
                swal("Error!", "Couldnt delete", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
           swal("Error!", "Couldnt delete", "error");
        }
    });

});


function editDepartment(code, name) {
    //alert('goood');
    console.log(code+name);
    $('#id').val(code);
    $('#departmentName').val(name);
    $('#editModal').modal('show');
}

$('#updateDepartmentForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    $('#editModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'department',
        type: "PUT",
        data: formData,
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
           
             if (data == 0) {
                swal("Success!", "Updated Successfully", "success");
                getDepartments();
            } else {
                swal("Error!", "Couldnt update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Couldnt update", "error");
        }
    });

});
