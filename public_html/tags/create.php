<?php
require_once '../models/Tag.php';
if (isset($_POST['tag'])) {
    $tag = new Tag;

    $tag->insert(['tag' => $_POST['tag']]);
}
