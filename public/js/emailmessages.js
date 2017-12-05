$('#emailmessageTbl').DataTable({
    order: [[2, "desc"]]
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
                    $('.members').append($('<option>', {
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
        url: "getemailgroups",
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


                    $('#groups').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));

                });

            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Contact Systen Administrator", "error");
        }
    });


}


$('#sendMessageForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    //alert('ddd');
    var formData = new FormData($(this)[0]);
    console.log(formData);
    $('#loaderModal').modal('show');

    $.ajax({
        url: "sendmessage",
        type: "POST",
        data: formData,
        cache: false,
        //   dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            $('.loader').removeClass('be-loading-active');
            console.log('server data :' + data);
            $('#loaderModal').modal('hide');

            $('#newMessageModal').modal('hide');

            if (data == 0) {
                document.getElementById("sendMessageForm").reset();

                swal("Success!", "Message sent Successfully", "success");
            } else {
                swal("Error!", "Couldnt Send Messages", "error");
            }

        }

    });
});

function getMessageDetail(id) {
    //alert(id);

    $.ajax({
        url: "message/" + id,
        type: "GET",
        dataType: 'json',
        success: function (data) {
            $("#fileattacments").html("");
            console.log('server data :' + data);
            var sender = data.details[0].sender_name;
            var subject = data.details[0].subject;
            var date_sent = data.details[0].date_created;
            var message = data.details[0].message;
            var attachments = data.attachments;

            //message
            var individual_receipients = data.individualreceipients;
            var group_receipients = data.groupreceipients;

            var receipients = individual_receipients.concat(group_receipients);
            var receipients = receipients.join(", ");

            console.log('sender' + receipients);
            $('#receipients').html(receipients);
            $('#sender').html(sender);
            $('#subject').html(subject);
            $('#date_sent').html(date_sent);
            $('#messageContent').html(message);

            $.each(attachments, function (i, item) {
                //fileattacments
                console.log(item.path);
                $("#fileattacments").append("<div>" + item.filename + " <a href='download/" + item.path + "' class='btn-sm  button-3d button-action button-pill btn_3d'>Download File</a> </div><br/>");

            });

            $('#messageDetail').modal('show');
        }

    });
}