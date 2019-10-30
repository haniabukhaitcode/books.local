<?php
require_once '../models/Author.php';
if (isset($_POST['inputName'])) {
    $author = new Author;
    $author->insert(['author' => $_POST['inputName']]);
}
