//retreive all regions


var info = {
    type: "retreiveRegion"
};

$.ajax({
    url: 'controllers/ConfigurationController.php?_=' + new Date().getTime(),
    type: "GET",
    data: info,
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('#region').append($('<option>', {
                value: item.code,
                text: item.name
            }));
        });

    }
});

getUnAssignedDistricts();

function getUnAssignedDistricts() {
    var infotype = {
        type: 'retreiveUnAssignedDistricts'
    };
    $.ajax({
        url: 'controllers/ConfigurationController.php?_=' + new Date().getTime(),
        type: "GET",
        data: infotype,
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#districts').append($('<option>', {
                    value: item.code,
                    text: item.name
                }));
            });

        }
    });
}




$('#saveRegionDistrictsForm').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        url: 'controllers/pairRegionDistrictsController.php?_=' + new Date().getTime(),
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function (data) {
            console.log('response from server :' + data);




            $('#regionDistrictsModal').modal('hide');
            var successStatus = data.success;


            document.getElementById("saveRegionDistrictsForm").reset();

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
                $('#districts').select2("val", "");
                $('#districts').select2();

                $('#districts').html("");

                $('#region').select2("destroy");
                $('#region').select2("");
                getRegionDistricts();
                getUnAssignedDistricts();

            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });




});


//regionDistrictTbl

var datatable = $('#regionDistrictTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});

getRegionDistricts();

function getRegionDistricts()
{

    var info = {
        type: "retreiveRegionDistricts"
    };


    $.ajax({
        url: 'controllers/ConfigurationController.php?_=' + new Date().getTime(),
        type: "GET",
        data: info,
        success: function (data) {

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
                    r[++j] = '<td>' + value.region_name + '</td>';
                    r[++j] = '<td>' + value.district_name + '</td>';
                    r[++j] = '<td><button onclick="deleteRegionDistrict(\'' + value.code + '\')" class="btn btn-outline-danger btn-sm" type="button">Delete</button></td>';

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



function deleteRegionDistrict(code) {
    console.log(code);
    $('#code').val(code);

    $('#confirmModal').modal('show');
}

$('#deleteRegionDistrictForm').on('submit', function (e) {
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
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
            var successStatus = data.success;
            document.getElementById("deleteRegionDistrictForm").reset();

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
                $('#districts').select2("val", "");
                $('#districts').select2();

                $('#districts').html("");
                getUnAssignedDistricts();

                getRegionDistricts();
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

});




