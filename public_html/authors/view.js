$(document).ready(function() {
	$.get('view.php', function(data) {
		$('#table_content').html(data);
	});
	$('#modalBtn').click(function() {
		$('#showAddModal').modal('show');
		$('#addForm')[0].reset();
	});
	$('#addbutton').click(function() {
		var author = $('#author').val();
		var addForm = $('#addForm').serialize();
		$.ajax({
			type: 'POST',
			url: '../authors/create.php',
			data: { addForm: addForm, author: author },
			success: function() {
				$('#author').val();
				$('#addForm').serialize();
				$.get('view.php', function(html) {
					$('#table_content').html(html);
				});
				$('#records_content')
					.fadeOut(1100)
					.html(data);
			},
			error: function() {
				$('#records_content')
					.fadeIn(3000)
					.html('<div class="text-center">error here</div>');
			},
			beforeSend: function() {
				$('#records_content')
					.fadeOut(700)
					.html('<div class="text-center">Loading...</div>');
			},
			complete: function() {
				$('#showAddModal').hide();
				$('#addForm')[0].reset();
			},
		});
	});
	//
	//edit
	$(document).on('click', '.edit', function() {
		var id = $(this).data('id');
		var author = $('#author' + id).text();
		console.log(id);
		$('#editID').modal('show');
		$('#editAuthor').val(author);
		$('#editButton').val(id);
	});

	$('#editButton').click(function() {
		var id = $(this).val();
		var editForm = $('#editForm').serialize();

		console.log(id);
		$.ajax({
			type: 'POST',
			url: '../authors/edit.php',
			data: editForm + '&id=' + id,
			success: function() {
				$('#editID').modal('hide');
				$('#editForm')[0].reset();
				showTable();
				$('#alert').slideDown();
				$('#alerttext').text('Member Updated Successfully');
			},
		});
	});
	//
	//delete
	$(document).on('click', '.delete', function() {
		var id = $(this).data('id');
		var author = $('#author' + id).text();
		console.log(id);

		$('#deleteID').modal('show');
		$('#deleteAuthor').text(author);
		$('#deleteButton').val(id);
	});

	$('#deleteButton').click(function() {
		var id = $(this).val();
		$.ajax({
			type: 'POST',
			url: '../authors/delete.php',
			data: {
				id: id,
			},
			success: function() {
				$('#deleteID').modal('hide');
				showTable();
				$('#alert').slideDown();
				$('#alerttext').text('Member Deleted Successfully');
			},
		});
	});
});

function showTable() {
	$.ajax({
		type: 'POST',
		url: 'handler.php',
		data: {
			handler: 1,
		},
		success: function(data) {
			$('#table').html(data);
		},
	});
}
