<?php
require "../navbar.html";

?>
<!DOCTYPE html>
<html>

<head>
    <title>Create Authors</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <body>
        <div class="container">
            <div style="height:50px;"></div>
            <div class="well" style="margin-left:auto; margin-right:auto; padding:auto; width:70%;">
                <h4><strong>Create Authors</strong></h4>

                <span><a id="add" style="cursor:pointer; color:white;" class="btn btn-success col-3 mb-4"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
                <div style="height:15px;"></div>



                <div id="table">
                    <h1>From PHP</h1>
                    <table class="table table-dark">
                        <thead>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../models/Author.php';
                            $author = new Author;
                            foreach ($author->fetchAll() as $row) :  ?>
                                <tr>
                                    <th scope="row"><?= $row->id; ?></th>

                                    <td><span id="author<?= $row->id; ?>"><?= $row->author; ?></span></td>

                                    <td>
                                        <a style="cursor:pointer;" class="btn btn-sm btn-primary edit" data-id="<?= $row->id; ?>"> Edit</a>&nbsp;
                                        <a style="cursor:pointer;" class="btn btn-sm btn-danger delete" data-id="<?= $row->id; ?>"> Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>




                <div id="alert" class="alert alert-success">
                    <center><span id="alerttext"></span></center>
                </div>

                <?php require "../modal/addHeader.php"  ?>
                <label class="control-label" style="position:relative; color:white; top:7px;">Author:</label>
                <?php require "../modal/addFooter.php"  ?>

                <?php require "../modal/editHeader.php"  ?>
                <label class="control-label" style="position:relative; color:white; top:7px;">Author:</label>
                <?php require "../modal/editFooter.php"  ?>

                <?php require "../modal/deleteHeader.php"  ?>
                <h5>
                    <center style="color:white;">Author: <strong><span style="color:white;" name="deleteAuthor" id="deleteAuthor"></span></strong></center>
                </h5>

                <?php require "../modal/deleteFooter.php"  ?>


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                <script src="../db/BaseModel.js"></script>
            </div>
    </body>

</html>