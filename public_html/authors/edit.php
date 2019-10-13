<?php

require_once "../models/Author.php";
if (isset($_POST['rowName'])) {
    $author = new Author;

    $author->update(

        [
            'author' => $_POST['rowName']
        ],

        [
            "id" => $_POST['id']
        ]
    );
}
