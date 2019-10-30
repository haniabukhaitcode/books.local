<?php
require_once "../models/Author.php";
if (isset($_POST['id'])) {
    $author = new Author;
    $author->delete(['id' => $_POST['id']]);
}
