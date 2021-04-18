<?php
error_reporting(0);
include '../database/DBconnection.php';
$con = new Database(); 

class Expenselists
{

    private $db;

    public function __construct()
    {
        // TODO: DB Connection
        $this->db = new Database();
    }

    public function index($table)
    {
        
    
        // $sql = "SELECT * FROM $table ORDER BY id ASC";
        $sql ="SELECT * FROM `expenselists` INNER JOIN expensivess ON expensivess.id = expenselists.exp_name ";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    public function create($data)
    {
         	  
        $exp_name = $data['exp_name'];
        $exp_position = $data['exp_position'];
        $name_of_expense = $data['name_of_expense'];
        $name_of_sector = $data['name_of_sector'];
        $amount = $data['amount'];
        $description = $data['description'];
        $date = $data['date'];
        $result = null;

        if ($exp_name == '' && $exp_position == '' && $name_of_expense == '' && $name_of_sector == ''  && $amount == '' && $description == '' && $result == '' && $date == '') {
            $result = "Input Field Is Require ";
        }elseif (!preg_match("/[A-Za-z0-9]+/", $_POST['name_of_sector'])) {
            $result = "The name of sector provided is invalid";
        } else {
            try{
                $sql = "INSERT INTO expenselists (exp_name,exp_position,name_of_expense,name_of_sector,amount,description,date)
                        VALUES(:exp_name,:exp_position,:name_of_expense,:name_of_sector,:amount,:description,:ex_date)";
                $query = $this->db->pdo->prepare($sql);
                $query->bindValue('exp_name',$exp_name);
                $query->bindValue('exp_position', $exp_position);
                $query->bindValue('name_of_expense', $name_of_expense);
                $query->bindValue('name_of_sector', $name_of_sector);
                $query->bindValue('amount', str_replace(' ', '_', trim($amount)));
                $query->bindValue('description', $description);
                $query->bindValue('ex_date', $date);

                if ($query->execute() == 1) {
                    $result = "Expense Added";
                }
                return $result;
            }catch(PDOException $pdo_error) {
                throw new error("Failed to execute query:\n". $pdo_error->getMessage());
            }
        }

    }

    
    public function details($table, $id)
    {
        $sql = "SELECT expenselists.*,expensivess.expensive_name,expensivess.position FROM
         expenselists  INNER JOIN expensivess ON expensivess.id = expenselists.exp_name 
        WHERE expenselists.exp_name = ".$id;
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(); 
        return $results;
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
       
        $id = $data['id'];
        $category = $data['category'];
        $status = $data['status'];
        $result = null;

        if ($exp_name == '' && $exp_position == '' && $name_of_expense == '' && $name_of_sector == ''  && $amount == '' && $description == '' && $result == '') {
            $result = "Input Field Is Require ";
        }elseif (!preg_match("/[A-Za-z0-9]+/", $_POST['name_of_sector'])) {
            $result = "The name of sector provided is invalid";
        } else {
            try{
                $sql = "UPDATE categories SET category = :category, status = :status WHERE id =:id";
                $query = $this->db->pdo->prepare($sql);
                $query->bindValue(':category', $category);
                $query->bindValue(':status', $status);
                $query->bindValue(':id', $id);
                $result = $query->execute();
                if ($result) {
                    $result = "<div class='alert alert-success'><strong>Success !</strong> Category Successfully Updated.</div>";
                    return $result;
                } else {
                    $result = "<div class='alert alert-danger'><strong>Error !</strong> Something Wrong, Please try again </div>";
                    return $result;
                }
            }catch(PDOException $pdo_error) {
                throw new error("Failed to execute query:\n". $pdo_error->getMessage());
            }
        }
    }


    public function delete($id,$table)
    {
        $sql = "DELETE FROM categories WHERE id =:id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(':id', $id);
        if ($query->execute() == 1) {
            $result = "person Delete Successfully";
        }
        return $result;
    }


}