<?php
require_once "../models/Author.php";
if (isset($_POST['editName'])) {
    $author = new Author;
    $author->update(
        [
            'author' => $_POST['editName']
        ],
        [
            "id" => $_POST['id']
        ]
    );
}
