<div id="alert" class="alert alert-success">
    <center><span id="alerttext"></span></center>
</div>

<?php
require '../models/Author.php';
require '../models/Tag.php';
$author = new Author();
$tag = new Tag();
?>

<?php require "../modal/addHeader.php"  ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-4">
            <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Title:</label>
            <input type="text" class="form-control" name="inputTitle" id="inputTitle">
        </div>

        <div class="col-sm-12 mt-4">
            <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Author:</label>
            <select type="text" class="form-control" name="inputAuthor" id="inputAuthor">
                <?php
                foreach ($author->fetchAll() as $row) : ?>
                    <option value="<?= $row->id; ?>"><?= $row->author; ?></a></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-sm-12 mt-4">
            <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Tag:</label>
            <select class="form-control" id="tagsSelect" name="tags" multiple="multiple">
                <?php
                foreach ($tag->fetchAll() as $row) : ?>
                    <option value=<?= $row->id ?>><?= $row->tag ?></option>
                <?php
                endforeach; ?>
            </select>
        </div>
        <div class="col-sm-12 mt-4">
            <label class="control-label" style="position:relative; color:white; margin-right:10px;">Images:</label>
            <input type="file" name="book_image" id="book_image" style="color:white; margin-right:10px;">
            <?php
            if (!empty($book->book_image)) : ?>
                <td>
                    <img id="book_image" src="/books/uploads/' . $book->book_image . '" alt="" />
                </td>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require "../modal/addFooter.php"  ?>
<!-- *********************************************** -->

<?php require "../modal/editHeader.php"  ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-4">
            <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Title:</label>
            <input type="text" class="form-control" name="inputTitle" id="inputTitle">
        </div>

        <div class="col-sm-12 mt-4">
            <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Author:</label>
            <select type="text" class="form-control" name="inputAuthor" id="inputAuthor">
                <?php
                foreach ($author->fetchAll() as $row) : ?>
                    <option value="<?= $row->id; ?>"><?= $row->author; ?></a></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-sm-12 mt-4">
            <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Tag:</label>
            <select class="form-control" id="tagsSelect" name="tags" multiple="multiple">
                <?php
                foreach ($tag->fetchAll() as $row) : ?>
                    <option value=<?= $row->id ?>><?= $row->tag ?></option>
                <?php
                endforeach; ?>
            </select>
        </div>
        <div class="col-sm-12 mt-4">
            <label class="control-label" style="position:relative; color:white; margin-right:10px;">Images:</label>
            <input type="file" name="book_image" id="book_image" style="color:white; margin-right:10px;">
            <?php
            if (!empty($book->book_image)) : ?>
                <td>
                    <img id="book_image" src="/books/uploads/' . $book->book_image . '" alt="" />
                </td>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require "../modal/editFooter.php"  ?>

<!-- *********************************************** -->

<?php require "../modal/deleteHeader.php"  ?>
<h5>
    <center style="color:white;">Title: <strong><span style="color:white;" name="deleteName" id="deleteName"></span></strong></center>
</h5>
<?php require "../modal/deleteFooter.php"  ?>