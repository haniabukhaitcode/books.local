<?php

require_once "../models/Tag.php";
if (isset($_POST['editTag'])) {
    $tag = new Tag;

    $tag->update(

        [
            'tag' => $_POST['editTag']
        ],

        [
            "id" => $_POST['id']
        ]
    );
}
