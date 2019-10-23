<!DOCTYPE html>
<html>

<head>
    <title>Create Tags</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
</head>

<body style="background:#FFFBEB">
    <?php
    require_once '../models/TagsToBooks.php';
    require_once '../public/navbar.html';

    if ($_POST) {
        header("Location: " . htmlspecialchars($_SERVER["PHP_SELF"]) . "?id[]=" . implode(",", $_POST['tags']) . "");
    } else {
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
        $tagBook = new TagsToBooks();
        $result = $tagBook->fetchTagBooks($id);
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div class="container mt-4">
            <div class="row no-gutters">
                <select class='form-control col-6' name='tags[]' multiple='multiple'>
                    <?php
                    require '../models/Tag.php';
                    $tag = new Tag();
                    foreach ($tag->fetchAll() as $row) : ?>
                        <option value=<?= $row->id ?>><?= $row->tag ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="col-4 ml-5 mt-4">
                    <button type="submit" class="btn btn-primary mb-2 col-4">Show</button>
                </div>
            </div>
        </div>
    </form>

    <div class="container">
        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Books Associated With Tags</h1>
        <hr class="mt-2 mb-5">
        <div class="row text-center text-lg-left">
            <?php foreach ($result as $row) :  ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <h5 class="d-block mb-4 h-100">
                        <center>Book Tag: <?= $row->tag; ?></center>
                        <?= '<img  class="img-fluid img-thumbnail" style="min-width:100%; max-width:100%; min-height:200px; max-height:200px;" src="/books.local/public_html/public/images/' . $row->book_image . ' " alt="picture" />'; ?>
                    </h5>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



</body>

</html>