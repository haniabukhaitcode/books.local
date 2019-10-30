<!DOCTYPE html>
<html>

<head>
    <title>Create Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />
</head>
<?php
require "../public/navbar.html";

?>
<style>
    label#title-error.error {
        color: red;
        font-size: 18px;
    }
</style>

<body style="background:#FFFBEB">
    <div class="container">
        <div style="height:50px;"></div>
        <div class="well" style="margin-left:auto; margin-right:auto; padding:auto;">
            <h4><strong>Create Authors</strong></h4>
            <span>
                <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" style="cursor:pointer; color:white;" class="btn btn-success col-3 mb-4">Add</button>
            </span>
            <div style="height:15px;"></div>
            <table id="user_data" class="table table-dark">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </thead>
            </table>
        </div>
    </div>


    <?php require "./modalView.php" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>


    <script src="http://malsup.github.com/jquery.form.js"></script>


    <script src="BookModel.js"></script>
    </div>
</body>

</html>