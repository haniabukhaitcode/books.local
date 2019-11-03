<?php
require '../models/Book.php';
$book = new Book;


$query = '';
$output = array();
$query .= "SELECT * FROM fetchTagBooks ";
if (isset($_POST["search"]["value"])) {
	$query .= 'WHERE id LIKE "%' . $_POST["search"]["value"] . '%" ';
	$query .= 'OR title LIKE "%' . $_POST["search"]["value"] . '%" ';
}
if (isset($_POST["order"])) {
	$query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
	$query .= 'ORDER BY id ASC ';
}
if ($_POST["length"] != -1) {
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$stmt = $book->pdoStmt($query);

$data = array();

$filtered_rows = $stmt->rowCount(); //10


foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row) {
	$book_image = '';
	if ($row->book_image != '') {
		$book_image = '<img src="../public/images/' . $row->book_image . '" class="img-thumbnail" width="100" height="100" />';
	} else {

		$book_image = '';
	}

	$sub_array = array();
	$sub_array[] = $row->id;
	$sub_array[] = $row->title;
	$sub_array[] = $row->author;
	$sub_array[] = $row->tagName;
	$sub_array[] = $book_image;
	$sub_array[] = '<button type="button" name="update" id="' . $row->id . '" class="btn btn-sm btn-primary update">Update</button> <button type="button" name="delete" id="' . $row->id . '" class="btn btn-sm btn-danger delete">Delete</button>';

	$data[] = $sub_array;
}

$output = array(
	"draw" => intval($_POST["draw"]),
	"recordsTotal" => $filtered_rows,
	"recordsFiltered" => $book->get_total_all_records($query),
	"data" => $data
);

echo json_encode($output);
