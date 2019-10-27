$(document).ready(function() {
	//add
	$('#add').click(function() {
		$('#addnew').modal('show');
		$('#addForm')[0].reset();
	});

	$('#addForm').submit(function(e) {
		e.preventDefault();
		var rowName = $('#rowName').val();

		var file_data = $('#book_image').prop('files')[0];
		var form_data = new FormData();

		form_data.append('book_image', file_data);
		form_data.append('tags', $('#tagsSelect').val());
		form_data.append('author_id', $('#inputAuthor').val());
		form_data.append('title', $('#inputTitle').val());

		if (rowName !== '') {
			var myLocation = location['href'];
			var index = myLocation.lastIndexOf('/');
			if (index != -1) {
				newLocation = myLocation.substr(0, index) + '/create.php';
			}

			$.ajax({
				type: 'POST',
				url: newLocation,
				data: form_data,
				contentType: false,
				processData: false,
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
		var rowName = $('#idVal')
			.val(id)
			.change();
		$('#editID').modal('show');
		$('#editName').val(rowName);
		$('#editButton').val(id);
		console.log(rowName);
	});

	$('#editForm').submit(function(e) {
		var id = $('#idVal').val();
		e.preventDefault();

		var file_data = $('#book_imageEdit').prop('files')[0];
		var form_data = new FormData();

		form_data.append('book_image', file_data);
		form_data.append('tags', $('#tagsSelectEdit').val());
		form_data.append('author_id', $('#inputAuthorEdit').val());
		form_data.append('title', $('#inputTitleEdit').val());

		var myLocation = location['href'];
		var index = myLocation.lastIndexOf('/');
		if (index != -1) {
			newLocation = myLocation.substr(0, index) + '/edit.php?id=' + id;
		}

		$.ajax({
			type: 'POST',
			url: newLocation,
			data: form_data,
			contentType: false,
			processData: false,
			success: function() {
				$('#editID').modal('hide'); //*
				$('#editForm')[0].reset(); //*
				console.log(newLocation);
				console.log(editForm);
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
		$('#deleteName').text(rowName);
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
				console.log(newLocation);
				showTable();
				$('#alert').slideDown();
				$('#alerttext').text('Member Deleted Successfully');
			},
		});
	});
});

myLocation = lastIndex => {
	var myLocation = location['href'];
	var index = myLocation.lastIndexOf('/');
	if (index != -1) {
		newLocation = myLocation.substr(0, index) + lastIndex;
	}
	return newLocation;
};
showTable = () => {
	$.ajax({
		type: 'POST',
		url: myLocation('/handler.php'),
		data: { handler: 1 },

		success: function(data) {
			$('#table').html(data);
		},
	});
};
