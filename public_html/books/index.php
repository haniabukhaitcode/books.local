<?php
require "../navbar.html";

?>
<!DOCTYPE html>
<html>

<head>
    <title>Create Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="background:#FFFBEB">
    <div class="container">
        <div style="height:50px;"></div>
        <div class="well" style="margin-left:auto; margin-right:auto; padding:auto; width:100%;">
            <h4><strong>Create Books</strong></h4>

            <span><a id="add" style="cursor:pointer; color:white;" class="btn btn-success col-3 mb-4"><span class="glyphicon glyphicon-plus"></span>Insert a book</a></span>
            <div style="height:15px;"></div>

            <div id="table">
                <h1>From PHP</h1>
                <table class="table table-dark">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Images</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                        <?php
                        require '../models/Book.php';
                        $book = new Book();

                        foreach ($book->fetchTagBooks() as $row) : ?>
                            <tr>
                                <th><?= $row->id;  ?></th>

                                <td id="deleteTitle"><?= $row->title; ?></td>
                                <td><a href="/authorsBooks/index.php?id=<?= $row->author_id; ?>" id="<?= $row->id; ?>" id="deleteAuthor"><?= $row->author;  ?></a></td>
                                <td><a href="/tagsToBooks/index.php?id[]=<?= $row->tagID; ?> " id="<?= $row->id; ?>" id="deleteTagName"><?= $row->tagName; ?></a></td>
                                <td><?= '<img src="/static/' . $row->book_image . '" alt="no_image" style="width:100px;height:100px;" id="deleteBookImage"> </img>'; ?></td>
                                <td>
                                    <a style="cursor:pointer;" class="btn btn-sm btn-primary edit" data-id="<?= $row->id; ?>"> Edit</a>&nbsp;
                                    <a style="cursor:pointer;" class="btn btn-sm btn-danger delete" data-id="<?= $row->id; ?>"> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach;  ?>
                    </tbody>
                </table>
            </div>

            <?php require "./modalView.php" ?>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="../db/BaseModel.js"></script>
        </div>
</body>

</html>