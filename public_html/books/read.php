<?php
require '../models/Book.php';
$book = new Book;


$sql = "SELECT * FROM fetchTagBooks";
$query = '';
$query .= "SELECT * FROM fetchTagBooks ";
if (isset($_POST["search"]["value"])) {
	$query .= 'WHERE id LIKE "%' . $_POST["search"]["value"] . '%" ';
	$query .= 'OR title LIKE "%' . $_POST["search"]["value"] . '%" ';
}
if (isset($_POST["order"])) {
	$query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
	$query .= 'ORDER BY id DESC ';
}
if ($_POST["length"] != -1) {
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$filtered_rows = $book->fetchAll($query);

$data = array();

$output = array(
	//tells DataTables to redraw the table
	"draw" => intval($_POST["draw"]),
	"recordsFiltered" => $filtered_rows,
	"recordsTotal" => $book->get_total_all_records($sql),
	"data" => $book->fetchTagBooks()
);

echo json_encode($output);
