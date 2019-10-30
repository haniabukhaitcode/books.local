<div id="alert" class="alert alert-success">
    <center><span id="alerttext"></span></center>
</div>

<?php
require '../models/Author.php';
require '../models/Tag.php';
$author = new Author();
$tag = new Tag();
?>

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form" enctype="multipart/form-data">
            <div class="modal-content" style="background-color:#32383e">
                <div class="modal-header">
                    <h3 style="margin-left: 0; color:white;" class="modal-title" id="myModalLabel">Add New Data</h3>
                    <button type="button" class="close" style="color: white" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" class="form-control" />
                    <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" />
                    <br />
                    <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Author:</label>

                    <select type="text" class="form-control" name="author_id" id="author_id">
                        <?php
                        foreach ($author->fetchAll() as $row) : ?>
                            <option value="<?= $row->id; ?>"><?= $row->author; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <br />
                    <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Tags:</label>
                    <select type="text" name="tags[]" id="tags" class="form-control tags" multiple="multiple">
                        <?php
                        foreach ($tag->fetchAll() as $row) : ?>
                            <option value=<?= $row->id ?>><?= $row->tag ?></option>
                        <?php
                        endforeach; ?>
                    </select>
                    <br />
                    <label class="control-label" style="position:relative; color:white;  margin-right:10px;">Image:</label>
                    <input type="file" name="book_image" id="book_image" />
                    <span id="user_uploaded_image"></span>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id" />
                    <input type="hidden" name="operation" id="operation" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>