<?php
error_reporting(0);
include '../database/DBconnection.php';
$con = new Database(); 

class Expensive
{

    private $db;

    public function __construct()
    {
        // TODO: DB Connection
        $this->db = new Database();
    }

    public function index($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id ASC";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    public function create($data)
    {
        $expensive_name = $data['expensive_name'];
        $position = $data['position'];
        $status = $data['status'];
        $result = null;

        if ($expensive_name == '' && $position == '' && $status == '') {
            $result = "Input Field Is Require ";
        }elseif (!preg_match("/[A-Za-z0-9]+/", $_POST['expensive_name'])) {
            $result = "The expensive name provided is invalid";
        }elseif (!preg_match("/[A-Za-z0-9]+/", $_POST['position'])) {
            $result = "The position name provided is invalid";
        } else {
                try{

                    $sql = "INSERT INTO expensivess (expensive_name,position,status)VALUES(:expensive_name,:position,:status)";
                    $query = $this->db->pdo->prepare($sql);
                    $query->bindValue('expensive_name', str_replace(' ', '_', trim($expensive_name)));
                    $query->bindValue('position', str_replace(' ', '_', trim($position)));
                    $query->bindValue('status', $status);

                    if ($query->execute() == 1) {
                        $result = "Expensive Added";
                    }
                    return $result;
                }catch(PDOException $pdo_error) {
                    throw new error("Failed to execute query:\n". $pdo_error->getMessage());
                }
        }
    }

    
    
    public function edit($table, $id)
    {
        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();


        return $results;

    }

    public function update($data)
    {
       
        // $id = $data['id'];
        // $category = $data['category'];
        // $status = $data['status'];
        // $result = null;

        // if (strlen($category) < 3) {
        //     $result = "Category is too short";
        // } elseif ($category == '') {
        //     $result = "Category Field is required";
        // } elseif ($status == '') {
        //     $result = "Category Field is required";
        // } else {
        //     $sql = "UPDATE categories SET category = :category, status = :status WHERE id =:id";
        //     $query = $this->db->pdo->prepare($sql);
        //     $query->bindValue(':category', $category);
        //     $query->bindValue(':status', $status);
        //     $query->bindValue(':id', $id);
        //     $result = $query->execute();
        //     if ($result) {
        //         $result = "<div class='alert alert-success'><strong>Success !</strong> Category Successfully Updated.</div>";
        //         return $result;
        //     } else {
        //         $result = "<div class='alert alert-danger'><strong>Error !</strong> Something Wrong, Please try again </div>";
        //         return $result;
        //     }
        // }
    }


    public function delete($id,$table)
    {
        $sql = "DELETE FROM expensivess WHERE id =:id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(':id', $id);
        if ($query->execute() == 1) {
            $result = "Expensive Delete Successfully";
        }
        return $result;
    }


}