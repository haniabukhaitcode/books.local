<?php
require_once "../models/Author.php";

if (isset($_GET['deleteAuthor'])) {

    $author = new Author;
    $author->delete(['author' => $_GET['deleteAuthor']]);
}
