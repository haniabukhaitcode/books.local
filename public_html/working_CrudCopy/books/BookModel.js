$(document).ready(function () {
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
			url: "fetch.php",
			type: "POST",
		},


		columns: [
			{ data: 'id' },
			{ data: 'title' },
			{ data: 'author' },
			{ data: 'tagName' },
			{
				render: function (data, type, JsonResultRow, meta) {
					return '<img src="../upload/' + JsonResultRow.book_image + '">';
				}
			},
			{
				render: function (data, type, row) {
					let btn = '<td><button type="button" name="edit" id="' + row.id + '" class="btn btn-warning btn-xs update">Update</button></td>' +
						'<td><button type="button" name="delete" id="' + row.id + '" class="btn btn-danger btn-xs delete">Delete</button></td>';
					return btn;
				},
			},

		],
		columnDefs: [
			{
				orderable: true,
			}
		]
	});

	// $('#user_form').ajaxForm({
	// 	beforeSubmit: function (arr, $form, options) {
	// 		if ("condition is true") {
	// 			return true; //it will continue your submission.
	// 		}
	// 		else {
	// 			return false; //ti will stop your submission.
	// 		}

	// 	},
	// 	success: function (data) {
	// 		endLoading();
	// 		if (data.result == "success") {
	// 			showSuccessNotification(data.notification);
	// 		}
	// 		else {
	// 			showErrorNotification(data.notification);
	// 		}
	// 	}
	// });

	$(document).on('submit', '#user_form', function (event) {
		event.preventDefault();

		var title = $('#title').val();
		var author_id = $('#author_id').val();
		var tags = $('#tags').val();
		var extension = $('#book_image')
			.val()
			.split('.')
			.pop()
			.toLowerCase();
		if (extension != '') {
			if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
				alert('Invalid Image File');
				$('#book_image').val('');
				return false;
			}
		}

		if (title != '' && author_id != '' && tags != '') {
			$.ajax({
				url: 'insert.php',
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function (data) {

					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					console.log(data);
					dataTable.ajax.reload();

				},
			});
		} else {
			alert('Both Fields are Required');
		}

	});





	$(document).on('click', '.update', function () {
		var user_id = $(this).attr('id');

		$.ajax({
			url: 'fetch_single.php',
			method: 'POST',
			data: {
				user_id: user_id,
			},
			// queryString = $('#myFormId').formSerialize(),
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
					alert(data);
					dataTable.ajax.reload()
				},
			});
		} else {
			return false;
		}
	});
});
