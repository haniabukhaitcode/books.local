$(document).ready(function() {
	$('#add').click(function() {
		$('#addnew').modal('show');
		$('#addForm')[0].reset();
	});

	$('#addbutton').click(function() {
		var rowName = $('#rowName').val();
		if (rowName !== '') {
			var addForm = $('#addForm').serialize();
			$.ajax({
				type: 'POST',
				url: '../authors/create.php',
				data: addForm,
				success: function() {
					$('#addnew').modal('hide');
					$('#addForm')[0].reset();
					showTable();
					$('#alert').slideDown();
					$('#alerttext').text('Member Added Successfully');
				},
			});
		} else {
			alert('Please input both Fields');
		}
	});

	//edit
	$(document).on('click', '.edit', function() {
		var id = $(this).data('id');
		var rowName = $('#rowName' + id).text();
		$('#editID').modal('show');
		$('#editName').val(rowName);
		$('#editButton').val(id);
	});

	$('#editButton').click(function() {
		var id = $(this).val();
		var editForm = $('#editForm').serialize();
		$.ajax({
			type: 'POST',
			url: '../authors/edit.php',
			data: editForm + '&id=' + id,
			success: function() {
				$('#editID').modal('hide'); //*
				$('#editForm')[0].reset(); //*
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
		var rowName = $('#rowName' + id).text();
		$('#deleteID').modal('show');
		$('#deleteAuthor').text(rowName);
		$('#deleteButton').val(id);
	});

	$('#deleteButton').click(function() {
		var id = $(this).val();
		var myLocation = location['href'];
		var index = myLocation.lastIndexOf('/');
		if (index != -1) {
			newLocation = myLocation.substr(0, index) + '/delete.php';
		}

		$.ajax({
			type: 'POST',
			url: newLocation,
			data: {
				id: id,
			},
			dataType: 'html',
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
		url: location,

		success: function(data) {
			$('#table').html(data);
			console.log(data);
		},
	});
}
