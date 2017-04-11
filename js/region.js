/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('#saveRegionForm').on('submit', function (e) {
    e.preventDefault();
    var formData = $(this).serialize();

    console.log(formData);

    $('input:submit').attr("disabled", true);
    $.ajax({
        url: 'controllers/ConfigurationController.php?_=' + new Date().getTime(),
        type: "GET",
        data: formData,
        dataType: "json",
        success: function (data) {
            $('input:submit').attr("disabled", false);
            console.log(data);
            // $("#loader").hide();
            $('#region_modal').modal('hide');
            var successStatus = data.success;
            document.getElementById("saveRegionForm").reset();
            if (successStatus == 1) {
                $('input:submit').attr("disabled", false);
                Command: toastr["success"](data.message, "Success");
                
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "1000",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "swing",
                    "showMethod": "show"
                }

                getRegions();
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });



});
//retreive regions

var datatable = $('#regionTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});
getRegions();
function getRegions()
{

    var info = {
        type: "retreiveRegion"
    };
    console.log('new code here');
    $.ajax({
        url: 'controllers/ConfigurationController.php?_=' + new Date().getTime(),
        type: "GET",
        data: info,
        success: function (data) {
            // alert(data);
            console.log('new code here 2');
            console.log(data);
            datatable.clear().draw();
            var obj = jQuery.parseJSON(data);
            console.log('size' + obj.length);
            if (obj.length == 0) {
                console.log("NO DATA!");
            } else {
                $.each(obj, function (key, value) {


                    var j = -1;
                    var r = new Array();
                    // represent columns as array

                    r[++j] = '<td data-regioncode="' + value.code + '" data-region="' + value.name + '" class="subject">' + value.name + '</td>';
                    r[++j] = '<td><button onclick="editRegion(\'' + value.code + '\',\'' + value.name + '\',\'' + value.shortcode + '\')" disabled class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button>\n\
                              <button onclick="deleteRegion(\'' + value.code + '\',\'' + value.name + '\')" disabled class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';
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


function editRegion(code, name, shortcode) {
    //alert('goood');
    $('#code').val(code);
    $('#regionName').val(name);
    $('#detshortcode').val(shortcode);
    $('#editModal').modal('show');
}


function deleteRegion(code, title) {
    console.log(code + title);
    $('#regcode').val(code);
    $('#regionholder').html(title);
    $('#confirmModal').modal('show');
}


$('#deleteRegionForm').on('submit', function (e) {
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
            document.getElementById("deleteRegionForm").reset();
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
                getRegions();
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});
$('#updateRegionForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var formData = $(this).serialize();
    console.log(formData);
    $('#editModal').modal('hide');
    $('#loaderModal').modal('show');
    $.ajax({
        url: '../controllers/PostController.php?_=' + new Date().getTime(),
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (data) {
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
            var successStatus = data.success;
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
                getRegions();
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});
