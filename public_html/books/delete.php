<?php
require_once "../models/Book.php";

if (isset($_POST['id'])) {
    $book = new Book;
    $book->delete(['id' => $_POST['id']]);
}
