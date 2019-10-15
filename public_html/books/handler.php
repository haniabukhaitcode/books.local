<?php
if (isset($_POST['handler'])) : ?>
    <h1>From Ajax</h1>
    <table class="table table-dark">
        <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Tag</th>
            <th>Images</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php
                require '../models/Book.php';
                $book = new Book();

                foreach ($book->fetchTagBooks() as $row) : ?>
                <tr>
                    <th><?= $row->id;  ?></th>
                    <td><?= $row->title; ?></td>
                    <td><a href="/authorsBooks/index.php?id=<?= $row->author_id; ?>"><?= $row->author;  ?></a></td>
                    <td><a href="/tagsToBooks/index.php?id[]=<?= $row->tagID; ?> "><?= $row->tagName; ?></a></td>
                    <td><?= '<img src="/static/' . $row->book_image . '" alt="no_image" style="width:100px;height:100px;"> </img>'; ?></td>
                    <td>
                        <a style="cursor:pointer;" class="btn btn-sm btn-primary edit" data-id="<?= $row->id; ?>"> Edit</a>&nbsp;
                        <a style="cursor:pointer;" class="btn btn-sm btn-danger delete" data-id="<?= $row->id; ?>"> Delete</a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
<?php endif; ?>