<?php require '../models/Book.php';

if ($_POST) {
    $book = new Book;
    $book->insertBook(
        [
            "title" => $_POST["title"],
            "author_id" => $_POST["author_id"],
            "tags" => $_POST["tags"],
            "image" => $_FILES["book_image"]
        ]
    );

    header("Location: index.php");
}
?>

<?php require_once '../navbar.html';
require_once '../header.html'; ?>
<div class="modal fade" id="loadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Item</h4>
            </div>

            <div class="modal-body">
                <form data-toggle="validator" action="api/create.php" method="POST">


                    <div class="jumbotron">
                        <h4 class="mb-4">Add Books</h4>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter book name">
                            </div>

                            <div class="form-group">
                                <label>Author</label>
                                <div class="mb-3">
                                    <select class='form-control' name="author_id">
                                        <?php
                                        require '../models/Author.php';
                                        $author = new Author();
                                        foreach ($author->fetchAll() as $row) : ?>
                                            <option value="<?= $row->id; ?>"><?= $row->author; ?></a></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <select class='form-control' name="tags[]" multiple="multiple">
                                    <?php
                                    require '../models/Tag.php';
                                    $tag = new Tag();
                                    $result = $tag->fetchAll();
                                    foreach ($result as $row) : ?>
                                        <option value="<?= $row->id; ?>"><?= $row->tag; ?></a></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <input type="file" name="book_image" id="book_image">
                                </div>
                            </div>

                            <input type="submit" name="submit" class="btn btn-primary" />
                        </form>
                    </div>
            </div>
        </div>
    </div>

    <?php require_once '../footer.html'; ?>