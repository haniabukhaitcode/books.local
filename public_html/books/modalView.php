<div id="alert" class="alert alert-success">
    <center><span id="alerttext"></span></center>
</div>

<?php
require '../models/Author.php';
require '../models/Tag.php';
$author = new Author();
$tag = new Tag();
?>

<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#32383e">
            <div class="modal-header">
                <h3 style="margin-left: auto; color:white;" class="modal-title" id="myModalLabel">Add New Data</h3>
                <button type="button" class="close" style="color: white" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col " style="display: inline-flex">
                            <div class="container">
                                <form id="addForm" enctype="multipart/form-data">
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
                                            <select class="form-control" id="tagsSelect" name="tags[]" multiple="multiple">
                                                <?php
                                                foreach ($tag->fetchAll() as $row) : ?>
                                                    <option value=<?= $row->id ?>><?= $row->tag ?></option>
                                                <?php
                                                endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 mt-4">
                                            <label class="control-label" style="position:relative; color:white; margin-right:10px;">Images:</label>
                                            <input type="file" id="book_image" name="file" required />

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="color:white;" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                        <input type="submit" name="submit" value="Submit" style="color:white;" class=" btn btn-primary" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- *********************************************** -->

<div class="modal fade" id="editID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#32383e">
            <div class="modal-header">
                <h3 style="margin-left: auto; color:white;" class="modal-title" id="myModalLabel">Edit Author</h3>
                <button type="button" class="close" style="color: white" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col " style="display: inline-flex">
                            <div class="container">
                                <form id="editForm" enctype="multipart/form-data">
                                    <input type="hidden" id="idVal" />
                                    <div class="row">
                                        <div class="col-sm-12 mt-4">
                                            <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Title:</label>
                                            <input type="text" class="form-control" name="inputTitle" id="inputTitleEdit">
                                        </div>

                                        <div class="col-sm-12 mt-4">
                                            <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Author:</label>
                                            <select type="text" class="form-control" name="inputAuthor" id="inputAuthorEdit">
                                                <?php
                                                foreach ($author->fetchAll() as $row) : ?>
                                                    <option value="<?= $row->id; ?>"><?= $row->author; ?></a></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-12 mt-4">
                                            <label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Tag:</label>
                                            <select class="form-control" id="tagsSelectEdit" name="tags[]" multiple="multiple">
                                                <?php
                                                foreach ($tag->fetchAll() as $row) : ?>
                                                    <option value=<?= $row->id ?>><?= $row->tag ?></option>
                                                <?php
                                                endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 mt-4">
                                            <label class="control-label" style="position:relative; color:white; margin-right:10px;">Images:</label>
                                            <input type="file" id="book_imageEdit" name="file" required />

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="color:white;" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                        <input type="submit" name="submit" value="Submit" style="color:white;" class=" btn btn-warning" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- *********************************************** -->

<div class="modal fade" id="deleteID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#32383e">
            <div class="modal-header">
                <h3 style="margin-left: auto; color:white;" class="modal-title" id="myModalLabel">Are you sure ?</h3>
                <button type="button" class="close" style="color: white" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5>
                        <center style="color:white;">Title: <strong><span style="color:white;" name="deleteName" id="deleteName"></span></strong></center>
                    </h5>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="color:white;" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

                <button type="button" id="deleteButton" style="color: white" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
            </div>

        </div>
    </div>
</div>