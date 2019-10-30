$(document).ready(function () {

	$('#user_form').ajaxForm();

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

	// $(document).on('submit', '#user_form', function (event) {
	// 	event.preventDefault();
	// 	$(this).ajaxSubmit();
	// 	event.preventDefault();

	// var title = $('#title').val();
	// var author_id = $('#author_id').val();
	// var tags = $('#tags').val();
	// var extension = $('#book_image')
	// 	.val()
	// 	.split('.')
	// 	.pop()
	// 	.toLowerCase();
	// if (extension != '') {
	// 	if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
	// 		alert('Invalid Image File');
	// 		$('#book_image').val('');
	// 		return false;
	// 	}
	// }
	//var queryString = $(this).formSerialize();
	//$.post('create.php', queryString); 
	// if (title != '' && author_id != '' && tags != '') {
	// $.ajax({
	// 	url: 'create.php',
	// 	method: 'POST',
	// 	data: new FormData(this),
	// 	contentType: false,
	// 	processData: false,
	// 	success: function (data) {
	// 		$('#user_form')[0].reset();
	// 		$('#userModal').modal('hide');
	// 		dataTable.ajax.reload();
	// 		console.log(data);
	// 	},
	// });

	// } else {
	// 	alert('Both Fields are Required');
	// }
	// });

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
