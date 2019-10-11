<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#32383e">
            <div class="modal-header">
                <h3 style="margin-left: auto; color:white;" class="modal-title" id="myModalLabel">Add New Author</h3>
                <button type="button" class="close" style="color: white" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="addForm">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; color:white; top:7px;">Author:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="author" id="author">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="color:white;" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" id="addbutton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
            </div>

        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="editID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#32383e">
            <div class="modal-header">
                <h3 style="margin-left: auto; color:white;" class="modal-title" id="myModalLabel">Edit Author</h3>
                <button type="button" class="close" style="color: white" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <form id="editForm">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; color:white; top:7px;">Author:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="editAuthor" id="editAuthor">
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" style="color:white;" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" id="editButton" style="color:white;" class=" btn btn-warning"><span class="glyphicon glyphicon-check"></span> Update</a>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#32383e">
            <div class="modal-header">
                <h3 style="margin-left: auto; color:white;" class="modal-title" id="myModalLabel">Delete Author</h3>
                <button type="button" class="close" style="color: white" data-dismiss="modal" aria-hidden="true">&times;</button>


            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5>
                        <center style="color:white;">Author: <strong><span style="color:white;" name="deleteAuthor" id="deleteAuthor"></span></strong></center>
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