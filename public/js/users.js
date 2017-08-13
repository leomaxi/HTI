
$('.select2').select2();

$('#saveUserForm').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    console.log(formData);
    $('input:submit').attr("disabled", true);

    $.ajax({
        url: '../controllers/AccountController.php?_=' + new Date().getTime(),
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (data) {
            $('input:submit').attr("disabled", false);
            console.log('server details:' + data);
            $('.userdetails').html(data.userdetails);
            // $("#loader").hide();

            var successStatus = data.success;

            if (successStatus == 1) {
                $('#userModal').modal('hide');
                document.getElementById("saveUserForm").reset();

                $('input:submit').attr("disabled", false);
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
                getUsers();

            } else if (successStatus == 2) {

                Command: toastr["error"](data.message, "Error");

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
                };
            } else {
                $('#userModal').modal('hide');
                document.getElementById("saveUserForm").reset();
                Command: toastr["warning"](data.message, "Warning");

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
                getUsers();
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });




});


var datatable = $('#usersTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    }
});






getUsers();

function getUsers()
{

    $.ajax({
        url: 'getusers',
        type: "GET",
        dataType: "json",
        success: function (data) {
            // alert(data);
            console.log('new code here 2');
            console.log(data);
            datatable.clear().draw();

            if (data.length == 0) {
                console.log("NO DATA!");
            } else {
                $.each(data, function (key, value) {


                    var j = -1;
                    var r = new Array();
                    // represent columns as array
                    r[++j] = '<td >' + value.firstname + '</td>';
                    r[++j] = '<td>' + value.email + '</td>';
                    r[++j] = '<td>' + value.institution_name + '</td>';
                    r[++j] = '<td>' + value.role + '</td>';
                    r[++j] = '<td>' + value.usergroup_name + '</td>';
                    r[++j] = '<td>' + value.datecreated + '</td>';
                    r[++j] = '<td><button onclick="editUser(\'' + value.id + '\')" class="btn btn-outline-info btn-sm editBtn"  type="button">Edit</button></td>';

                    rowNode = datatable.row.add(r);
                });

                rowNode.draw().node();
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown + " " + textStatus + " New Error: " + jXHR);
        }
    });


}

function editUser(id) {


    $.ajax({
        url: 'user/' + id,
        type: "GET",
        //dataType: 'json',
        success: function (data) {
            $("#usergroups  option[value='']").prop("selected", true);

            console.log(data[0].firstname);
            var name = data[0].firstname;
            var email = data[0].email;
            var usergroup = data[0].usergroup;
            var role = data[0].role;
            var id = data[0].id;
            $('#username').val(name);
            $('#upuserid').val(id);
            $('#upemail').val(email);
            $('#role').val(role);
            $("#usergroups  option[value=" + usergroup + "]").prop("selected", true);

            $('#edituserModal').modal('show');


        }
    });

}



$('#updateUserForm').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    console.log(formData);
    $('input:submit').attr("disabled", true);

    $.ajax({
        url: 'userinfo',
        type: "PUT",
        data: formData,
        success: function (data) {
            $('input:submit').attr("disabled", false);
            console.log('server details:' + data);
            $('#edituserModal').modal('hide');

            if (data == 0) {
                swal("Success!", "Information Updated Successfully", "success");
                getUsers();
            } else {
                swal("Error!", "Couldnt Update", "error");
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });




});



function deleteUser(code, title) {
    console.log(code + title);
    $('#userid').val(code);
    $('#user_name').val(title);

    $('#userholder').html(title);
    $('#confirmModal').modal('show');
}


$('#deleteUserForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: '../controllers/deleteController.php?_=' + new Date().getTime(),
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (data) {
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
            var successStatus = data.success;
            document.getElementById("deleteUserForm").reset();

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
                getUsers();
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

});


$.ajax({
    url: 'getusergroups',
    type: "GET",
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('#usergroups').append($('<option>', {
                value: item.id,
                text: item.name
            }));
        });

    }
});
