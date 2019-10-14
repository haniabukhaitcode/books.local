<!DOCTYPE html>
<html>

<head>
    <title>Create Tags</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
</head>

<?php
require_once '../navbar.html';
require_once '../models/AuthorBook.php';
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$authorBook = new AuthorBook();
$result = $authorBook->fetchAuthorBooks($id);

?>

<body style="background:#FFFBEB">
    <div class="container">
        <div class="row">
            <div class="col-4 ml-4 mt-4">
                <h2>
                    <?php
                    foreach ($result as $row) :  ?>
                        <?=
                                $row->authorName;
                            break; ?>
                    <?php endforeach; ?>
                </h2>
            </div>
        </div>


        <div class="container">
            <hr class="mt-2 mb-5">
            <div class="row text-center text-lg-left">
                <?php
                foreach ($result as $row) :  ?>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="d-block mb-4 h-100">
                            <center>Book Title: <?= $row->title; ?></center>
                            <?= '<img  class="img-fluid img-thumbnail" style="min-width:100%; max-width:100%; min-height:200px; max-height:200px;" src="/books.local/public_html/static/' . $row->book_image . ' " alt="picture" />'; ?>
                        </a>

                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>