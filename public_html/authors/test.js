

$(document).ready(function () {
	$('#add').click(function () {
		$('#addnew').modal('show');
		$('#addForm')[0].reset();
	});
	$(function () {

		var addForm = $('#addForm').serialize();
		$("form[name='addAuthor']").validate({
			rules: {
				inputName: {
					required: true,
					minlength: 3
				}
			},
			messages: {

				inputName: {
					required: "Please provide a password",
					minlength: "Author Name must be at least 3 characters long"
				},

			},
			submitHandler: function (form) {
				$(form).ajaxSubmit({
					type: "POST",
					url: newLocation,
					data: addForm,
					success: function () {
						$('#contact-form').hide();
						$("form[name='addAuthor']").resetForm();
						showTable();
						$('#alert').slideDown();
						$('#alerttext').text('Member Added Successfully');


					}
				});
			}

		});
	});
});