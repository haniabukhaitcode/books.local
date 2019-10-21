$(document).ready(function () {
    $('#add').click(function () {
        $('#addnew').modal('show');
        $('#myForm')[0].reset();
    });

    $('#addbutton').click(function () {
        var rowName = $('#rowName').val();

        if (rowName !== '') {
            var myForm = $('#myForm').serialize(); //inputName=ddd
            var myLocation = location['href'];
            var index = myLocation.lastIndexOf('/');
            if (index != -1) {
                newLocation = myLocation.substr(0, index) + '/create.php';
            }

            $.ajax({
                type: 'POST',
                url: newLocation,
                data: myForm,
                success: function () {
                    $('#addnew').modal('hide');
                    $('#myForm')[0].reset();
                    showTable();
                    $('#alert').slideDown();
                    $('#alerttext').text('Member Added Successfully');
                    console.log(newLocation);
                    console.log(myForm);
                },
            });
        } else {
            alert('Please input both Fields');
        }
    });

    //edit
    $(document).on('click', '.edit', function () {
        var id = $(this).data('id');
        var rowName = $('#rowName' + id).text();
        $('#editID').modal('show');
        $('#editName').val(rowName);
        $('#editButton').val(id);
        console.log(rowName);
    });
    $('#editButton').click(function () {
        var id = $(this).val();
        var editForm = $('#editForm').serialize();
        var myLocation = location['href'];
        var index = myLocation.lastIndexOf('/');
        if (index != -1) {
            newLocation = myLocation.substr(0, index) + '/edit.php';
        }
        $.ajax({
            type: 'POST',
            url: newLocation,
            data: editForm + '&id=' + id,
            success: function () {
                $('#editID').modal('hide'); //*
                $('#editForm')[0].reset(); //*
                console.log(newLocation);
                showTable();
                $('#alert').slideDown();
                $('#alerttext').text('Member Updated Successfully');
            },
        });
    });
    //
    //delete

    $(document).on('click', '.delete', function () {
        var id = $(this).data('id');
        var rowName = $('#rowName' + id).text();


        $('#deleteID').modal('show');
        $('#deleteName').text(rowName);


        $('#deleteButton').val(id);
    });

    $('#deleteButton').click(function () {
        var id = $(this).val();
        var myLocation = location['href'];
        var index = myLocation.lastIndexOf('/');
        if (index != -1) {
            newLocation = myLocation.substr(0, index) + '/delete.php';
        }

        $.ajax({
            type: 'POST',
            url: newLocation,
            data: {
                id: id,
            },
            dataType: 'html',
            success: function () {
                $('#deleteID').modal('hide');
                console.log(newLocation);
                showTable();
                $('#alert').slideDown();
                $('#alerttext').text('Member Deleted Successfully');
            },
        });
    });
});

function showTable() {
    var myLocation = location['href'];
    var index = myLocation.lastIndexOf('/');
    if (index != -1) {
        newLocation = myLocation.substr(0, index) + '/handler.php';
    }
    $.ajax({
        type: 'POST',
        url: newLocation,
        data: { handler: 1 },

        success: function (data) {
            $('#table').html(data);
        },
    });
}