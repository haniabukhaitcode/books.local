<?php


// DB table to use
$table = 'fetchTagBooks';

// Table's primary key
$primaryKey = 'id';

// Table's primary key
$columns = array(
	array('db' => 'id', 'dt' => 'id'),
	array('db' => 'title',  'dt' => 'title'),
	array('db' => 'author',   'dt' => 'author'),
	array('db' => 'tagName',     'dt' => 'tagName'),
	array('db' => 'book_image',     'dt' => 'book_image'),

);

// SQL server connection information
$sql_details = array(
	'user' => 'hani',
	'pass' => 'Hani.123!@#',
	'db'   => 'Test',
	'host' => 'localhost'
);



require('ssp.class.php');

echo json_encode(
	SSP::simple($_POST, $sql_details, $table, $primaryKey, $columns)
);
