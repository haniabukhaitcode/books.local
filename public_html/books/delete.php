<?php
require_once "../models/Book.php";


if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $book = new Book;
    $book->delete(array("id" => $id));
}
