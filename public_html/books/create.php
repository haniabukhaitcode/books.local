<?php require '../models/Book.php';
if (isset($_POST)) {
    $book = new Book;
    $book->insertBook(
        [
            "title" => $_POST["title"],
            "author_id" => $_POST["author_id"],
            "tags" => explode(",", $_POST["tags"]),
            "image" => $_FILES["book_image"]
        ]
    );
}
