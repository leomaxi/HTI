/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('.select2').select2();


var datatable = $('#emailgroupTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});

getUsers();

function getUsers()
{

    $.ajax({
        url: "../account/getusers",
        type: "GET",
        dataType: "json",
        success: function (data) {
            // alert(data);members
            console.log('new code here 2');
            console.log(data);

            if (data.length == 0) {
                console.log("NO DATA!");
            } else {
                $.each(data, function (key, item) {

                    if (item.firstname == null) {
                        item.firstname = '';
                    }
                    $('#members').append($('<option>', {
                        value: item.id,
                        text: item.firstname
                    }));

                });

            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Contact Systen Administrator", "error");
        }
    });


}


getEmailGroups();

function getEmailGroups()
{

    $.ajax({
        url: 'getemailgroups',
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
                    r[++j] = '<td><button onclick="viewGroupInfo(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-primary btn-sm editBtn" type="button">View</button>\n\
                              \n\<button onclick="editGroup(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
                             <button onclick="deleteGroup(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

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


//saveEmailGroupForm

$('#saveEmailGroupForm').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    console.log(formData);

    $("#loaderModal").modal('show');
    $('input:submit').attr("disabled", true);

    $.ajax({
        url: 'saveemailgroup',
        type: "POST",
        data: formData,
        success: function (data) {
            $('input:submit').attr("disabled", false);
            console.log('rerereer' + data);
            $("#loaderModal").modal('hide');
            $('#userModal').modal('hide');
            document.getElementById("saveEmailGroupForm").reset();

            if (data == 0) {
                swal({
                    title: "Success",
                    text: "Saved Successfully",
                    type: "success",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "OK",
                    closeOnConfirm: false
                },
                function () {
                    var currenturl = window.location.href;
                    window.location = currenturl;
                });

                getEmailGroups();
            } else {
                swal("Error!", "Couldnt SAve", "error");
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            $("#loaderModal").modal('hide')
            swal("Error!", "Contact System Administrator", "error");

        }
    });




});


function editGroup(id, name) {

    console.log('goood' + name);
    $('#code').val(id);
    $('#updategroupName').val(name);
    $('#editModal').modal('show');
}

function deleteGroup(id, name) {
    console.log(id + name);
    $('#deletedid').val(id);
    $('#holdername').html(name);
    $('#confirmModal').modal('show');
}

function deleteMember(id, name) {
    console.log(id + name);
    $('#deletedid').val(id);
    $('#holdername').html(name);
    $('#deleteModal').modal('show');
    
}


function viewGroupInfo(id, name) {
    console.log(id + name);
    $('#memberName').html(name);
    getEmailGroupMembers(id);
    $('#viewModal').modal('show');
}

var emaildatatable = $('#emailgroupmemberTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});
function getEmailGroupMembers(id)
{

    $.ajax({
        url: 'getemailmembers/' + id,
        type: "GET",
        dataType: "json",
        success: function (data) {

            console.log(data);
            emaildatatable.clear().draw();


            if (data.length == 0) {
                console.log("NO DATA!");
                 $('#viewModal').modal('show');
            } else {
                $.each(data, function (key, value) {


                    var j = -1;
                    var r = new Array();
                    // represent columns as array
                    r[++j] = '<td class="subject">' + value.firstname + '</td>';
                    r[++j] = '<td><button onclick="deleteMember(\'' + value.member_id + '\',\'' + value.firstname + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

                    rowNode = emaildatatable.row.add(r);
                });

                rowNode.draw().node();
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}


$('#updateForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    $('#editModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'emailgroup',
        type: "PUT",
        data: formData,
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');


            if (data == 0) {
                swal("Success!", "Information Updated Successfully", "success");
                getEmailGroups();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

});



$('#deleteForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var deletedid = $('#deletedid').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'deleteemailgroup/' + deletedid,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteForm").reset();
            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
                getEmailGroups();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

});

$('#deleteMemberForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var deletedid = $('#deletedid').val();
    var token = $('#token').val();
    $('#deleteModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'deleteemailgroupmember/' + deletedid,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteMemberForm").reset();
            if (data == 0) {
                swal("Success!", "Deleted Successfully", "success");
               $('#viewModal').hide();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

});

