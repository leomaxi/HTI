/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//save region


$('#saveInstitutionTypeForm').on('submit', function (e) {
    $('input:submit').attr("disabled", true);
    e.preventDefault();

    var formData = $(this).serialize();
    console.log(formData);

    $.ajax({
        url: 'instituitiontype',
        type: "POST",
        data: formData,
        success: function (data) {
            console.log(data);
            $('#institutionModal').modal('hide');


            document.getElementById("saveInstitutionTypeForm").reset();

            if (data == 0) {
                swal("Success!", "Data Saved Successfully", "success");
                getInstitutionTypes();
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

var datatable = $('#instypesTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});

getInstitutionTypes();

function getInstitutionTypes()
{



    $.ajax({
        url: 'getinstituitionstypes',
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
                    r[++j] = '<td><button onclick="editInstituteType(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
                              <button onclick="deleteInstitutionType(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

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



function deleteInstitutionType(code, title) {
    console.log(code + title);
    $('#code').val(code);
    $('#nameholder').html(title);
    $('#confirmModal').modal('show');
}

$('#deleteInstitutionTypeForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#code').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'instituitiontype/' + code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {

            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteInstitutionTypeForm").reset();

            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
                getInstitutionTypes();
            } else {
                swal("Error!", "Couldnt delete", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Couldnt delete", "error");
        }
    });

});


function editInstituteType(code, name) {
    //alert('goood');
    $('#code').val(code);
    $('#instname').val(name);
    $('#editModal').modal('show');
}

$('#updateInstituteTypeForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    $('#editModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'instituitiontype',
        type: "PUT",
        data: formData,
        dataType: "json",
        success: function (data) {
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            if (data == 0) {
                swal("Success!", "Updated Successfully", "success");
                getInstitutionTypes();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Couldnt Update", "error");
        }
    });

});
