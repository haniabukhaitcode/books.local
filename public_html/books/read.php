<?php
require '../models/Book.php';
$book = new Book;



$output = array(

	"data" => $book->fetchTagBooks()
);


echo json_encode($output);
