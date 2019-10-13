<?php
if (isset($_POST['handler'])) : ?>
    <h1>From Ajax</h1>
    <table class="table table-dark">
        <thead>
            <th>ID</th>
            <th>Tag</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php
                require_once '../models/Tag.php';
                $tag = new Tag;
                foreach ($tag->fetchAll() as $row) :  ?>
                <tr>
                    <th scope="row"><?= $row->id; ?></th>

                    <td><span id="tag<?= $row->id; ?>"><?= $row->tag; ?></span></td>
                    <td>
                        <a style="cursor:pointer;" class="btn btn-sm btn-primary edit" data-id="<?= $row->id; ?>"> Edit</a>&nbsp;
                        <a style="cursor:pointer;" class="btn btn-sm btn-danger delete" data-id="<?= $row->id; ?>"> Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>