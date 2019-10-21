<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<style>
    #inputName-error.error {
        color: red;
        font-size: 18px;
    }

    #editName-error.error {
        color: red;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> -->
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color:#32383e">
                        <div class="modal-header">
                            <h3 style="margin-left: auto; color:white;" class="modal-title" id="myModalLabel">Add New Data</h3>
                            <button type="button" class="close" style="color: white" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form action="" name="addAuthor">
                                    <div class="row">
                                        <div class="col mb-2" style="display: block">
                                            <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Author:</label>
                                            <input type="text" class="form-control" name="inputName" id="inputName">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="addbutton" class="btn btn-primary">Submit</button>
                                        <button type="button" style="color:white;" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        $(function() {

            var addForm = $('#addForm').serialize();
            $("form[name='addAuthor']").validate({
                rules: {
                    inputName: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {

                    inputName: {
                        required: "Please provide a password",
                        minlength: "Author Name must be at least 3 characters long"
                    },

                },
                submitHandler: function(form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        url: newLocation,
                        data: addForm,
                        success: function() {
                            $('#contact-form').hide();
                            $("form[name='addAuthor']").resetForm();
                            showTable();
                            $('#alert').slideDown();
                            $('#alerttext').text('Member Added Successfully');


                        }
                    });
                }

            });
        });
    </script>
</body>

</html>