<div id="alert" class="alert alert-success">
    <center><span id="alerttext"></span></center>
</div>

<?php require "../modal/addHeader.php"  ?>
<label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Tag:</label>
<input type="text" class="form-control" name="inputName" id="inputName">
<?php require "../modal/addFooter.php"  ?>

<?php require "../modal/editHeader.php"  ?>
<label class="control-label" style="position:relative; color:white; top:7px; margin-right:10px;">Tag:</label>
<input type="text" class="form-control" name="editName" id="editName">
<?php require "../modal/editFooter.php"  ?>

<?php require "../modal/deleteHeader.php"  ?>
<h5>
    <center style="color:white;">Tag: <strong><span style="color:white;" name="deleteName" id="deleteName"></span></strong></center>
</h5>
<?php require "../modal/deleteFooter.php"  ?>