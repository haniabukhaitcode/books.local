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

<body>
    <div class="container box">
        <h1 align="center">PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</h1>
        <br />
        <div class="table-responsive">
            <br />
            <div align="right">
                <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
            </div>
            <br /><br />
            <table id="user_data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="10%">Title</th>
                        <th width="10%">Author</th>
                        <th width="10%">Tags</th>
                        <th width="10%">Image</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>


    <?php require "./modalView.php" ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>

    <script src="BookModel.js"></script>
    </div>
</body>

</html>