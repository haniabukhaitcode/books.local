<table class="table table-dark">
    <tr>
        <th>ID</th>
        <th>Tag</th>
        <th>Actions</th>
    </tr>

    <?php
    require_once '../models/Tag.php';
    $tag = new Tag;
    foreach ($tag->fetchAll() as $row) :  ?>
        <tr>
            <td scope="row"><?= $row->id; ?></td>
            <td><span id="rowName<?= $row->id; ?>"><?= $row->tag; ?></span></td>
            <td>
                <a style="cursor:pointer;" class="btn btn-sm btn-primary edit" id="<?= $row->id; ?>">Edit</a>&nbsp;
                <a style="cursor:pointer;" class="btn btn-sm btn-danger delete" id="<?= $row->id; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<script type="text/javascript">
    $('.delete').click(function() {
        var id = $(this).attr('id');
        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {
                id: id
            },
            success: function(data) {
                $('#records_content').fadeOut(1100).html(data);
                $.get("view.php", function(data) {
                    $("#table_content").html(data);
                });
            }
        });
    });

    $('.edit').click(function() {
        var id = $(this).attr('id');
        $.ajax({
            url: 'edit.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $("#edit").html(data);
                $('#edit').show();
            }
        });
    });
</script>