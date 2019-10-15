<?php
require_once "../models/Book.php";


if (isset($_POST['id'],
$_POST['deleteTitle'],
$_POST['deleteAuthor'],
$_POST['deleteTagName'],
$_POST['deleteBookImage'])) {

    $book = new Book;
    $book->delete(
        [
            'id' => $_POST['id'],
            'title' => $_POST['deleteTitle'],
            'author' => $_POST['deleteAuthor'],
            'tag' => $_POST['deleteTagName'],
            'book_image' => $_POST['deleteBookImage']
        ]
    );
}
