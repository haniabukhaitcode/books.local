<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

require '../models/Book.php';

if ($_POST) {

    $book = new Book;
    $book->updateBook(

        $_GET['id'],

        [
            "title" => $_POST["title"],
            "author_id" => $_POST["author_id"],
            "tags" => explode(",", $_POST["tags"]),
            "image" => $_FILES["book_image"]
        ]

    );
}
