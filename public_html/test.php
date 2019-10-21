<html>

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>

    <script>
        // wait for the DOM to be loaded 
        $(document).ready(function() {

        });

        $('#myForm').ajaxForm(function() {
            // bind 'myForm' and provide a simple callback function 
            $.validator.addMethod("cRequired", $.validator.methods.required,
                "Customer name required");
            // alias minlength, too
            $.validator.addMethod("cMinlength", $.validator.methods.minlength,
                // leverage parameter replacement for minlength, {0} gets replaced with 2
                $.validator.format("Customer name must have at least {0} characters"));
            // combine them both, including the parameter for minlength
            $.validator.addClassRules("customer", {
                cRequired: true,
                cMinlength: 2
            });
        });
    </script>
</head>
...
<form id="myForm" action="test.php" method="post">
    <input name="customer1" class="customer" required>
    <input name="customer2" class="customer" required>
    <input name="customer3" class="customer" required>
    <input type="submit" value="Submit Comment" />
</form>