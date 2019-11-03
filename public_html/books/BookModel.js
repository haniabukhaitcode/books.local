$(document).ready(function () {
	var options = {
		clearForm: 'true',
		resetForm: 'true',
		cache: 'false',

		ajax: 'create.php',
		beforeSubmit: validate(),
		success: function (msg) {
			$('#userModal').modal('hide');
			dataTable.ajax.reload();
		},
	};

	function validate() {
		$('#user_form').validate({
			rules: {
				'title': 'required',
				'tags[]': 'required',
				'book_image': 'required',
			},
			messages: {
				'tags[]': 'Select at least one tag',
				'book_image': 'Select an Image',
			},
		});
	}

	$('#user_form').ajaxForm(options);

	$('#add_button').click(function () {
		$('#user_form')[0].reset();
		$('.modal-title').text('Add User');
		$('#action').val('Add');
		$('#operation').val('Add');
		$('#user_uploaded_image').html('');
	});

	var dataTable = $('#user_data').DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: 'read.php',
			type: 'POST',
		},

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
