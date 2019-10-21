$(function () {
	$.validator.addMethod(
		'inputName',
		function (value, element) {
			return element.value.length >= 3 && /\d/.test(value) && /[a-z]/i.test(value);
		},
		'At least 3 characters and contains one number and one letter',
	);
});

$('#addForm').validate({
	rules: {
		inputName: {
			required: true,
			inputName: true,
		},
	},
});

$(function () {
	$.validator.addMethod(
		'editName',
		function (value, element) {
			return element.value.length >= 3 && /\d/.test(value) && /[a-z]/i.test(value);
		},
		'At least 3 characters and contains one number and one letter',
	);
});

$('#editForm').validate({
	rules: {
		editName: {
			required: true,
			editName: true,
		},
	},
});
