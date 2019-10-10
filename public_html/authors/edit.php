<?php

require_once "../models/Author.php";
if (isset($_POST['editAuthor'])) {
    $author = new Author;

    $author->update(

        [
            'author' => $_POST['editAuthor']
        ],

        [
            "id" => $_POST['id']
        ]
    );
}
