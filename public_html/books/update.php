<?php
require '../models/Book.php';
$book = new Book;

if (isset($_POST["user_id"])) {

	$output = array();


	$stmt = $book->fetchTagBooksbyid($_POST["user_id"]);


	echo json_encode($stmt[0]);
}
