<?php
require_once "../models/Tag.php";

if (isset($_POST['id'])) {

    $tag = new Tag;
    $tag->delete(['id' => $_POST['id']]);
}
