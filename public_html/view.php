<script>
    //get
    $(document).ready(function() {

        $('#btn').click(function() {
            $.get("test.txt", function(data, status) {
                $("#test").html(data);
                alert(status);
            })

        });
    });
</script>
<script>
    //input change
    $(document).ready(function() {
        var name = $("input").val();
        $.post("suggestions.php", {
            suggestion: name
        }, function(data, status) {
            $("#test").html(data);
            console.log(status);
        })
    });
</script>
<!-- serverside -->
<?php
if (isset($_POST['suggestion'])) {
    $name = $_POST['suggestion'];
    if (!empty($name)) {
        foreach ($existingNames as $existingName) {
            if (strpos($existingName, $name) !== false) {
                echo $existingName;
                echo "<br>";
            }
        }
    };
}

?>
<script>
    $(document).ready(function() {
        //load
        $('#btn').click(function() {
            //
            $("#comments").load("load-comments.php", {
                //
            });
        })
    });
</script>

<body>
    <div id="comments">
        <?php
        $sql = "SELECT * FROM comments LIMIT 2";
        print_r($sql);
        // return $this->conn->query("select " . implode(',', $this->fields) . " from " . $this->table)->fetchAll(PDO::FETCH_ASSOC);
        $result = $comment->fetchAll($sql);
        print_r($result);
        if ($result > 0) :
            foreach ($result as $row) : ?>
                <p>
                    <?= $row->author; ?>
                    <br>;
                    <?= $row->message; ?>
                </p>;
            <?php endforeach;
                ?>
        <?php else : ?>
            <h1>There are no comments</h1>


        <?php endif; ?>


    </div>
    <button id="btn">Show more comments</button>
</body>

<?php
include "../models/Comment.php";
$comment = new Comment();
$commentNewCount = $_POST['commentNewCount'];
$sql = "SELECT * FROM comments LIMIT $commentNewCount";
print_r($sql);
// return $this->conn->query("select " . implode(',', $this->fields) . " from " . $this->table)->fetchAll(PDO::FETCH_ASSOC);
$result = $comment->fetchAll($sql);
print_r($result);
if ($result > 0) :
    foreach ($result as $row) : ?>
        <p>
            <?= $row->author; ?>
            <br>;
            <?= $row->message; ?>
        </p>;
    <?php endforeach;
        ?>
<?php else : ?>
    <h1>There are no comments</h1>


<?php endif; ?>