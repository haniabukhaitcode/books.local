<?php
require_once "../models/Book.php";


if (isset($_POST["user_id"])) {
    $book = new Book;
    $book->delete(['id' => $_POST["user_id"]]);
    if (!empty($result)) {
        echo 'Data Deleted';
    }
}
