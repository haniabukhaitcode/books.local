<?php
require_once "BaseModel.php";
require_once "BookTag.php";
class Book extends BaseModel
{
    protected $fields = [
        "id",
        "title",
        "book_image",
        "author_id"
    ];
    protected $table = "books";


    public function fetchTagBooks()
    {
        $query = "SELECT * FROM fetchTagBooks";

        $result = $this->fetchAll($query);
        return $result;
    }

    public function fetchTagBooksbyid($id)
    {
        $query = "SELECT * FROM fetchTagBooks where id = " . $id;

        $result = $this->fetchAll($query);
        return $result;
    }

    public function insertBook(array $data)
    {
        $tagModel = new BookTag();
        $imageName = $this->uploadPhoto($data['image'])["name"];
        $tags = $data['tags'];
        unset($data['image']);
        unset($data['tags']);
        $data['book_image'] = $imageName;
        $this->insert($data);
        $bookId = $this->conn->lastInsertId();
        foreach ($tags as $tag) {
            $tagModel->insert(array(
                "tag_id" => $tag,
                "book_id" => $bookId
            ));
        }
    }


    function updateBook($id, array $data)
    {
        $tagModel = new BookTag();
        $imageName = $this->uploadPhoto($data['image'])["name"];
        $tags = $data['tags'];
        unset($data['image']);
        unset($data['tags']);
        $data['book_image'] = $imageName;
        $this->update($data, array('id' => $id));
        $tagModel->delete(array("book_id" => $id));
        foreach ($tags as $tag) {
            $tagModel->insert(array(
                "tag_id" => $tag,
                "book_id" => $id
            ));
        }
    }



    private function uploadPhoto($image)
    {

        $path = date('mdYHis');
        // now, if image is not empty, try to upload the image

        if ($image) {
            // sha1_file() function is used to make a unique file name
            $target_directory = $_SERVER['DOCUMENT_ROOT'] . "/working_CrudCopy/upload/";
            $target_file = $target_directory . $path . $image["name"];
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

            // make sure that file is a real image
            $check = getimagesize($image["tmp_name"]);

            // make sure certain file types are allowed
            $allowed_file_types =  array("jpg", "jpeg", "png", "gif", "");
            if (!in_array($file_type,  $allowed_file_types)) {

                throw new Error("Only JPG, JPEG, PNG, GIF files are allowed.");
            }
            // make sure file does not exist
            if (file_exists($target_file)) {
                throw new Error("Image already exists. Try to change file name.");
            }
            // make sure submitted file is not too large, can't be larger than 1 MB
            if ($image['size'] > (99999999999999999999)) {
                throw new Error("Image must be less than 1 MB in size.");
            }
            if ($check !== false) {
                if (!is_dir($target_directory)) {
                    mkdir($target_directory, 777, true);
                }
                move_uploaded_file($image["tmp_name"], $target_file);
                return array(
                    "name" => $image["name"]
                );
            } else {
                throw new Error("Submitted file is not an image.");
            }
        } else {
            throw new Error("How about sending a fucking object first?");
        }
    }
}
