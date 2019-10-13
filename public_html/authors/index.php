	<?php
	require "../navbar.html";
	require "../header.html";
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-right">
					<button class="btn btn-success" id="modalBtn">Add New Record</button>
				</div>
				<div class="modal fade" id="showAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
												<input type="text" class="form-control" name="author" id="author" />
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="form-group col-md-3">
								<button type="button" class="btn btn-primary" id="addbutton" name="add">Add Record</button>
								<button type="button" href="javascript:void(0);" class="btn btn-default" id="cancel" name="add" data-dismiss="modal">
									Cancel
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="records_content"></div>
						<br />
						<div class="col-md-offset-1 col-md-10" id="table_content"></div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="./view.js"></script>
	</div>