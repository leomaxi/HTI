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
               
              //  getEmailGroups();
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
