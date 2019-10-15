<?php require '../models/Book.php';

$arrayGlobals = [
    $_POST['inputTitle'],
    $_POST['inputAuthor'],
    $_POST['inputTag'],
    $_POST['book_image']
];


if (isset($arrayGlobals)) {
    $book = new Book;
    $book->insertBook(
        [
            "title" => $_POST["inputTitle"],
            "author_id" => $_POST["inputAuthor"],
            "tags" => $_POST["inputTag"],
            "image" => $_FILES["book_image"]
        ]
    );
    print_r($arrayGlobals);
    print_r($book->insertBook);

    die;
}
