<?php
error_reporting(0);
include '../database/DBconnection.php';
$con = new Database(); 

class ShareHolder
{

    private $db;

    public function __construct()
    {
        // TODO: DB Connection
        $this->db = new Database();
    }
    // s_name	sharevalue	status

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
        $s_name = $data['s_name'];
        $sharevalue = $data['sharevalue']; 
        $result = null;

        if ($s_name == '' && $sharevalue == ''  ) {
            $result = "Input Field Is Require ";
        }elseif (!preg_match("/[A-Za-z0-9]+/", $s_name)) {
            $result = "The sharename provided is invalid";
        } else {
            try{
                $sql = "INSERT INTO shareholders (s_name,sharevalue)VALUES(:s_name,:sharevalue)";
                $query = $this->db->pdo->prepare($sql);
                $query->bindValue('s_name', str_replace(' ', '_', trim($s_name)), PDO::PARAM_STR);
                $query->bindValue('sharevalue', str_replace(' ', '_', trim($sharevalue)),PDO::PARAM_INT); 

                if ($query->execute() == 1) {
                    $result = "Share holder  Added";
                }
                return $result;
            }catch(PDOException $pdo_error) {
                throw new error("Failed to execute query:\n". $pdo_error->getMessage());
            }
        }

    }

    
    public function details($table, $id)
    {
        
        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
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
       
        $s_name = $data['s_name'];
        $sharevalue = $data['sharevalue']; 
        $result = null;

        if (strlen($s_name) < 3) {
            $result = "Share Holder Name too Short";
        } elseif ($sharevalue == '') {
            $result = "Share value field  required";
        } else {

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
        }
    }


    public function delete($id,$table)
    {
        $sql = "DELETE FROM shareholders WHERE id =:id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(':id', $id);
        if ($query->execute() == 1) {
            $result = "Share Holder Delete Successfully";
        }
        return $result;
    }


}