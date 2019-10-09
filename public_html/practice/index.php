<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
    <script src="ajaxCall.js"></script>

    <script>
        $(document).ready(function() {
            $("#submit").click(function() {
                let name = $("#title").val();
                let author_id = $("#author_id").val();
                let tag = $("#tag").val();
                let book_image = $("#book_image").val();
                let datastring = "name=" + name + "&author=" + author + "&tag=" + tag;
                $.ajax({
                    type: "post",
                    url: "action.php",
                    data: "datastring",
                    success: function(e) {
                        alert("Data inserted");
                    },
                    Error: function(e) {
                        alert("Failed to insert data");
                    }

                });
            });
        });
    </script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm12">
                <h2>PHP CRUD</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert_modal">Add Student</button>
                <div id="allData">

                </div>
            </div>
        </div>
        <script>
            function fetchData() {
                let operation = "fetching_the_data";
                $.ajax({
                    type: "post",
                    url: "action.php",
                    data: {
                        operation: operation
                    },
                    success: function(s) {
                        $("#allData").html(s);
                    },
                    Error: function(s) {
                        alert("Error in fetchData funcion");
                    }
                })
            }
        </script>
        <div class="modal fade" id="insert_modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form>

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                            </div>

                            <div class="form-group">
                                <label>Author</label>
                                <div class="mb-3">
                                    <select class='form-control' name="author_id" id="author_id">
                                        <?php
                                        require '../models/Author.php';
                                        $author = new Author();
                                        foreach ($author->fetchAll() as $row) : ?>
                                            <option value="<?= $row->id; ?>"><?= $row->author; ?></a></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tag</label>
                                <select class='form-control' name="tags[]" id="tag" multiple="multiple">
                                    <?php
                                    require '../models/Tag.php';
                                    $tag = new Tag();
                                    $result = $tag->fetchAll();
                                    foreach ($result as $row) : ?>
                                        <option value="<?= $row->id; ?>"><?= $row->tag; ?></a></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <button type="button" id="submit" class="btn btn-defaul">Submit</button>
                        </form>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <input type="file" name="book_image" id="book_image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>