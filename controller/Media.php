<?php
error_reporting(0);
include '../database/DBconnection.php';
$con = new Database();


class Media
{

    private $db;

    public function __construct()
    {
        // TODO: DB Connection
        $this->db = new Database();
    }

    // Index = show all Data
    public function index($table)
    {
        
        $sql = "SELECT * FROM $table ORDER BY id ASC";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    // Create = Insert Data in Database
    public function create($data)
    {
    //    print_r($data);
    //    exit;
        $name = $data['mname'];
        $occupation = $data['occupation'];
        $m_phone = $data['m_phone'];
        $address = $data['address'];
        $result = null;

        if ($name == '' && $occupation == '' && $m_phone == '' && $address == ''  ) {
            $result = "Input Field Is Require ";
        }  else {
            try{
                $sql = "INSERT INTO media (m_name,occupation,m_address,m_phone)VALUES(:name,:occupation,:address,:phone)";
                $query = $this->db->pdo->prepare($sql);
                $query->bindValue('name', str_replace(' ', '_', trim($name)));
                $query->bindValue('occupation', str_replace(' ', '_', trim($occupation)));
                $query->bindValue('address', $address);
                $query->bindValue('phone', $m_phone);

                if ($query->execute() == 1) {
                    $result = "Media  Added";
                }
                return $result;
            }catch(PDOException $pdo_error) {
                throw new error("Failed to execute query:\n". $pdo_error->getMessage());
            }
        }

    }

    // Details = Show single data row
    public function details($table, $id)
    {
        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    // Edit = View with Value of row
    public function edit($table, $id)
    {
        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;

    }

    // Update = Duplicate value
    public function update($data)
    {  
       
        $id = $data['id'];
        $name = $data['mname'];
        $occupation = $data['occupation'];
        $address = $data['m_address'];
        $phone = $data['m_phone'];
        $result = null;

        if ($name == '' && $occupation == '' && $m_phone == '' && $address == ''  ) {
            $result = "Input Field Is Require ";
        }elseif (!preg_match("/[A-Za-z0-9]+/", $name)) {
            $result = "The Media name provided is invalid";
        } else {
            try{
                $sql = " UPDATE media SET m_name = :name, occupation = :occupation, m_address = :address, m_phone = :phone  WHERE id =:id";
                $query = $this->db->pdo->prepare($sql);
                $query->bindValue(':name', $name);
                $query->bindValue(':occupation', $occupation);
                $query->bindValue(':address', $address);
                $query->bindValue(':phone', $phone);
                $query->bindValue(':id', $id);
                $result = $query->execute();
                if ($result) {
                    $result = "<div class='alert alert-success'><strong>Success !</strong> Media Successfully Updated.</div>";
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

    // Delete = delete single column 
    public function delete($id,$table)
    {
        $sql = "DELETE FROM media WHERE id =:id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(':id', $id);
        if ($query->execute() == 1) {
            $result = "Media Delete Successfully";
        }
        return $result;
    }



}