<?php

require_once "../models/Tag.php";
if (isset($_POST['editName'])) {
    $tag = new Tag;

    $tag->update(

        [
            'tag' => $_POST['editName']
        ],

        [
            "id" => $_POST['id']
        ]
    );
}
