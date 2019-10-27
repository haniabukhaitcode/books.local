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
                $data = $book->fetchTagBooks();
                foreach ($data as $row) : ?>
                <tr>
                    <th scope="row"><?= $row->id; ?></th>
                    <td><span id="inputTitle<?= $row->id; ?>"><?= $row->title; ?></span></td>
                    <td><a href="/books.local/public_html/authorsBooks/index.php?id=<?= $row->author_id; ?>"><?= $row->author;  ?></a></td>
                    <td><a href="/books.local/public_html/tagsToBooks/index.php?id[]=<?= $row->tagID; ?> "><?= $row->tagName; ?></a></td>
                    <td><?= '<img src="/books.local/public_html/public/images/' . $row->book_image . '" alt="no_image" style="width:100px;height:100px;"> </img>'; ?></td>
                    <td>
                        <a style="cursor:pointer;" class="btn btn-sm btn-primary edit" data-id="<?= $row->id; ?>"> Edit</a>&nbsp;
                        <a style="cursor:pointer;" class="btn btn-sm btn-danger delete" data-id="<?= $row->id; ?>"> Delete</a>
                    </td>

                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
<?php endif; ?>