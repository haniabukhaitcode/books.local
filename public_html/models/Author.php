<?php

require_once "BaseModel.php";

class Author extends BaseModel
{
    protected $fields = [
        "id",
        "author"

    ];
    protected $table = "authors";
}
