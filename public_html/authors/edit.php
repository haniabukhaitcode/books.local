<?php

require_once "../models/Author.php";
if (isset($_POST['editAuthor'])) {
    $author = new Author;

    $author->update(array('author' => $_POST['editAuthor']), array('id' => $_POST['id']));
}
