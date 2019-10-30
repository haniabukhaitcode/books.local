$(document).ready(function () {
	var options = {
		clearForm: 'true',
		resetForm: 'true',
		cache: 'false',
		beforeSubmit: validate(),
		success: function (msg) {
			$('#userModal').modal('hide');
			dataTable.ajax.reload();
		}
	}

	function validate() {
		$("#user_form").validate({
			rules: {
				title: "required",
				tags: tagsValidation()
			}
		});
	}
	
	function tagsValidation() {
		$.validator.addMethod("needsSelection", function (value, element) {
			var count = $(element).find('option:selected').length;

			if (count <= 0) {
				$('#user_form').validate({

					rules: {

						tags: { needsSelection: true },

						agree: "required"
					},

					messages: {

						tags: { needsSelection: "Select atleast one" },

						agree: ""
					},
				});
			}
		});
	}

	$("#user_form").ajaxForm(options);


	$('#add_button').click(function () {
		$('#user_form')[0].reset();
		$('.modal-title').text('Add User');
		$('#action').val('Add');
		$('#operation').val('Add');
		$('#user_uploaded_image').html('');
	});

	var dataTable = $('#user_data').DataTable({
		processing: true,
		serverSide: false,
		order: [],

		ajax: {
			url: 'read.php',
			type: 'POST',
		},

		columns: [
			{ data: 'id' },
			{ data: 'title' },

			{
				render: function (data, type, row, meta) {
					return '<td><a href="/authorsBooks/index.php?id=' + row.author_id + ' "> ' + row.author + ' </a></td>'
				}
			},

			{
				render: function (data, type, row, meta) {
					return '<td><a href="/tagsBooks/index.php?id[]=' + row.tagID + ' "> ' + row.tagName + ' </a></td>'
				}
			},
			{
				render: function (data, type, JsonResultRow, meta) {
					return '<img style="width:100px; height:100px;" src="../public/images/' + JsonResultRow.book_image + '">';
				},
			},
			{
				render: function (data, type, row) {
					let btn =
						'<td><button type="button" name="edit" id="' +
						row.id +
						'" class="btn btn-sm btn-primary update">Update</button></td>&nbsp;' +
						'<td><button type="button" name="delete" id="' +
						row.id +
						'" class="btn btn-sm btn-danger delete">Delete</button></td>';
					return btn;
				},
			},
		],
		columnDefs: [
			{
				orderable: true,
			},
		],
	});






	$(document).on('click', '.update', function () {
		var user_id = $(this).attr('id');

		$.ajax({
			url: 'update.php',
			method: 'POST',
			data: {
				user_id: user_id,
			},
			dataType: 'json',
			success: function (data) {
				$('#title').val(data.title);
				$('#author_id').val(data.author_id);
				$('#tags').val(data.tagID.split(','));
				$('.modal-title').text('Edit User');
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.book_image);
				$('#action').val('Edit');
				$('#operation').val('Edit');
				$('#userModal').modal('show');
			},
		});
	});

	$(document).on('click', '.delete', function () {
		var user_id = $(this).attr('id');
		if (confirm('Are you sure you want to delete this?')) {
			$.ajax({
				url: 'delete.php',
				method: 'POST',
				data: {
					user_id: user_id,
				},
				success: function (data) {

					dataTable.ajax.reload();
				},
			});
		} else {
			return false;
		}
	});
});
