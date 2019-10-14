<?php require '../models/Book.php';

$arrayGlobals = [
    $_POST['inputTitle'],
    $_POST['inputAuthor'],
    $_POST['inputTag'],
    $_POST['book_image']
];


if (isset($_POST)) {
    $book = new Book;
    $book->insertBook(
        [
            "title" => $_POST["title"],
            "author_id" => $_POST["author_id"],
            "tags" => $_POST["tags"],
            "image" => $_FILES["book_image"]
        ]
    );
}
