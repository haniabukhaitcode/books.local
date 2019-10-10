<?php
require_once '../models/Author.php';
if (isset($_POST['author'])) {
    $author = new Author;
    $author->insert(array('author' => $_POST['author']));
}
