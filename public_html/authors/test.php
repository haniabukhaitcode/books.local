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
    }

    #editName-error.error {
        color: red;
    }
</style>

<body>

    <div class="container">
        <div class="row">
            <div class="col">

                <div class="modal-dialog">
                    <div class="modal-content" style="background-color:#32383e">
                        <div class="modal-header">
                            <h3 style="margin-left: auto; color:white;" class="modal-title" id="myModalLabel">Add New Data</h3>
                            <button type="button" class="close" style="color: white" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form id="addForm">
                                    <div class="row">

                                        <div class="col-2" style="display: block ">
                                            <label class="control-label col-2" style="position:relative; color:white; top:7px; margin-right:10px;">Author:</label>
                                        </div>
                                        <div class="col-10" style="display: block ">
                                            <input type="text" class="form-control col-10" name="inputName" id="inputName">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="color:white;" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            <input type="submit" id="submit-button" value="Submit" style="color:white;" class="btn btn-primary" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color:#32383e">
                        <div class="modal-header">
                            <h3 style="margin-left: auto; color:white;" class="modal-title" id="myModalLabel">Edit Author</h3>
                            <button type="button" class="close" style="color: white" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="container">

                                <form id="editForm">
                                    <div class="row">
                                        <div class="col-2" style="display: block ">
                                            <label class="control-label col-2" style="position:relative; color:white; top:7px; margin-right:10px;">Author:</label>
                                        </div>
                                        <div class="col-10" style="display: block ">
                                            <input type="text" class="form-control col-10" name="editName" id="editName">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="color:white;" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            <input type="submit" id="submit-button" value="Submit" style="color:white;" class="btn btn-warning " />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:#32383e">
                <div class="modal-header">
                    <h3 style="margin-left: auto; color:white;" class="modal-title" id="myModalLabel">Are you sure ?</h3>
                    <button type="button" class="close" style="color: white" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <h5>
                            <center style="color:white;">Title: <strong><span style="color:white;" name="deleteName" id="deleteName"></span></strong></center>
                        </h5>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="color:white;" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="button" id="deleteButton" style="color: white" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                </div>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
    <script src="./test.js"></script>
</body>

</html>