<?php

require_once "../BaseModel/BaseModel.php";
class Author extends BaseModel
{
    protected $fields = [
        "id",
        "author"

    ];
    protected $table = "authors";
}
