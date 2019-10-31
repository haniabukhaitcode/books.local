<!DOCTYPE html>
<html>

<head>
    <title>Create Tags</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
</head>

<body style="background:#FFFBEB">
    <?php
    require_once '../models/TagsToBooks.php';
    require_once '../public/navbar.html';

    if ($_POST) {
        header("Location: " . htmlspecialchars($_SERVER["PHP_SELF"]) . "?id[]=" . implode(",", $_POST['tags']) . "");
    } else {
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
        $tagBook = new TagsToBooks();
        $result = $tagBook->fetchTagBooks($id);
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div class="container mt-4">
            <div class="row no-gutters">
                <select class='form-control col-6' name='tags[]' multiple='multiple'>
                    <?php
                    require '../models/Tag.php';
                    $tag = new Tag();
                    foreach ($tag->fetchAll() as $row) : ?>
                        <option value=<?= $row->id ?>><?= $row->tag ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="col-4 ml-5 mt-4">
                    <button type="submit" class="btn btn-primary mb-2 col-4">Show</button>
                </div>
            </div>
        </div>
    </form>

    <div class="container">
        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Books Associated With Tags</h1>
        <hr class="mt-2 mb-5">
        <div class="row text-center text-lg-left">
            <?php foreach ($result as $row) :  ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <h5 class="d-block mb-4 h-100">
                        <center>Book Tag: <?= $row->tag; ?></center>
                        <?= '<img  class="img-fluid img-thumbnail" style="min-width:100%; max-width:100%; min-height:200px; max-height:200px;" src="/books.local/public_html/public/images/' . $row->book_image . ' " alt="picture" />'; ?>
                    </h5>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



</body>

</html>






<!-- defined('BASEPATH') OR exit('No direct script access allowed');
class Datatables extends CI_Controller {
    public function index()
    {
        $this->load->view('datatable');
    }
    public function showEmployees()
    {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search= $this->input->post("search");
        $search = $search['value'];
        $col = 0;
        $dir = "";
        if(!empty($order))
        {
            foreach($order as $o)
            {
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }

        if($dir != "asc" && $dir != "desc")
        {
            $dir = "desc";
        }
        $valid_columns = array(
            0=>'emp_no',
            1=>'birth_date',
            2=>'first_name',
            3=>'last_name',
            4=>'gender',
            5=>'hire_date',
        );
        if(!isset($valid_columns[$col]))
        {
            $order = null;
        }
        else
        {
            $order = $valid_columns[$col];
        }
        if($order !=null)
        {
            $this->db->order_by($order, $dir);
        }
        
        if(!empty($search))
        {
            $x=0;
            foreach($valid_columns as $sterm)
            {
                if($x==0)
                {
                    $this->db->like($sterm,$search);
                }
                else
                {
                    $this->db->or_like($sterm,$search);
                }
                $x++;
            }                 
        }
        $this->db->limit($length,$start);
        $employees = $this->db->get("employees");
        $data = array();
        foreach($employees->result() as $rows)
        {

            $data[]= array(
                $rows->emp_no,
                $rows->birth_date,
                $rows->first_name,
                $rows->last_name,
                $rows->gender,
                $rows->hire_date,
                '<a href="#" class="btn btn-warning mr-1">Edit</a>
                 <a href="#" class="btn btn-danger mr-1">Delete</a>'
            );     
        }
        $total_employees = $this->totalEmployees();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }
    public function totalEmployees()
    {
        $query = $this->db->select("COUNT(*) as num")->get("employees");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }
} -->