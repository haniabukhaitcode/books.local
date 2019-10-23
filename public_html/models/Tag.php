<?php
require_once("BaseModel.php");


class Tag extends BaseModel
{
    protected $fields = [
        "id",
        "tag"
    ];

    protected $table = 'tags';
}
