<!DOCTYPE html>
<html>

<head>
    <title>Create Tags</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<?php
require "../public/navbar.html";

?>

<body style="background:#FFFBEB">

    <div class="container">
        <div style="height:50px;"></div>
        <div class="well" style="margin-left:auto; margin-right:auto; padding:auto; width:70%;">
            <h4><strong>Create Tags</strong></h4>
            <span><a id="add" style="cursor:pointer; color:white;" class="btn btn-success col-3 mb-4"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
            <div style="height:15px;"></div>
            <div id="table">
                <h1>From PHP</h1>
                <table class="table table-dark">
                    <thead>
                        <th>ID</th>
                        <th>Tag</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../models/Tag.php';
                        $tag = new Tag;
                        foreach ($tag->fetchAll() as $row) :  ?>
                            <tr>
                                <th scope="row"><?= $row->id; ?></th>

                                <td><span id="rowName<?= $row->id; ?>"><?= $row->tag; ?></span></td>

                                <td>
                                    <a style="cursor:pointer;" class="btn btn-sm btn-primary edit" data-id="<?= $row->id; ?>"> Edit</a>&nbsp;
                                    <a style="cursor:pointer;" class="btn btn-sm btn-danger delete" data-id="<?= $row->id; ?>"> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?php require "./modalView.php" ?>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="../tags/TagModel.js"></script>
        </div>
</body>

</html>