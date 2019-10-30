<?php
$sql = "SELECT * FROM fetchTagBooks";
$query = '';
$output = array();
$query .= "SELECT * FROM fetchTagBooks ";
if (isset($_POST["search"]["value"])) {
	$query .= 'WHERE id LIKE "%' . $_POST["search"]["value"] . '%" ';
	$query .= 'OR title LIKE "%' . $_POST["search"]["value"] . '%" ';
}

require '../models/Book.php';
$book = new Book;




$output = array(
	"data" => $book->fetchTagBooks()
);


echo json_encode($output);
