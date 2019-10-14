<?php
require_once '../models/Tag.php';
if (isset($_POST['inputName'])) {
    $tag = new Tag;

    $tag->insert(['tag' => $_POST['inputName']]);
}
