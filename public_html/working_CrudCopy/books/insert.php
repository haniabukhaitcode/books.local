<?php
require '../models/Book.php';


if (isset($_POST["operation"]))

	if ($_POST["operation"] == "Add") {
		$book = new Book;
		$result = $book->insertBook(
			[
				"title" => $_POST["title"],
				"author_id" => $_POST["author_id"],
				"tags" => $_POST["tags"],
				"image" => $_FILES["book_image"]
			]
		);

		if (!empty($result)) {
			echo 'Data Inserted';
		}
	}

if (isset($_POST["operation"])) {
	if ($_POST["operation"] == "Edit") {
		$book = new Book;
		$book->updateBook(
			$_POST['user_id'],
			[
				"title" => $_POST["title"],
				"author_id" => $_POST["author_id"],
				"tags" => $_POST["tags"],
				"image" => $_FILES["book_image"]
			]
		);

		if (!empty($result)) {
			echo 'Data Updated';
		}
	}
}
