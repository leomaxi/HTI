/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//save region


$('#saveGradeForm').on('submit', function (e) {

    e.preventDefault();
    $('input:submit').attr("disabled", true);
    // var validator = $("#saveRegionForm").validate();
    var formData = $(this).serialize();
    console.log(formData);

    $.ajax({
        url: 'gradetype',
        type: "POST",
        data: formData,
        success: function (data) {
            console.log(data);
            $('#gradeModal').modal('hide');

            document.getElementById("saveGradeForm").reset();


            if (data == 0) {
                swal("Success!", "Data Save Successfully", "success");
                getgradeTypes();
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

var datatable = $('#gradeTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});

getgradeTypes();

function getgradeTypes()
{



    $.ajax({
        url: 'getgradetypes',
        type: "GET",
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
                    r[++j] = '<td><button onclick="editGrade(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
                              <button onclick="deleteGrade(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

                    rowNode = datatable.row.add(r);
                });

                rowNode.draw().node();
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Error in retreiving data:Contact Administrator", "error");

        }
    });
}



function deleteGrade(code, title) {
    console.log(code + title);
    $('#code').val(code);
    $('#gradename').html(title);
    $('#confirmModal').modal('show');
}

$('#deleteGradeTypeForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#code').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'gradetype/' + code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {

            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteGradeTypeForm").reset();

            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
                getgradeTypes();
            } else {
                swal("Error!", "Couldnt delete", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Couldnt delete", "error");
        }
    });

});


function editGrade(code, name) {
    //alert('goood');
    $('#code').val(code);
    $('#nameholder').val(name);
    $('#editModal').modal('show');
}

$('#updateDistrictForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    $('#editModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'gradetype',
        type: "PUT",
        data: formData,
        success: function (data) {
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            if (data == 0) {
                swal("Success!", "Information Updated Successfully", "success");
                getgradeTypes();
            } else {
                swal("Error!", "Couldnt updated", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Couldnt update", "error");
        }
    });

});
