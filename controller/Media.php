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
        $address = $data['address'];
        $result = null;

        if (strlen($name) < 2) {
            $result = "Media name too Short";
        } elseif ($occupation == '') {
            $result = "Occupation field  required";
        } elseif ($address == '') {
            $result = "Address field  required";
        } else {

            $sql = "INSERT INTO media (m_name,occupation,m_address)VALUES(:name,:occupation,:address)";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue('name', str_replace(' ', '_', trim($name)));
            $query->bindValue('occupation', str_replace(' ', '_', trim($occupation)));
            $query->bindValue('address', $address);

            if ($query->execute() == 1) {
                $result = "Media  Added";
            }
            return $result;
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
        $name = $data['mname'];
        $occupation = $data['occupation'];
        $address = $data['address'];
        $id = $data['id'];
        $result = null;

        if (strlen($name) < 2) {
            $result = "Media name too Short";
        } elseif ($occupation == '') {
            $result = "Occupation field  required";
        } elseif ($address == '') {
            $result = "Address field  required";
        } else {
            $sql = "UPDATE media SET m_name = :name, occupation = :occupation, m_address = :address WHERE id =:id";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':name', $name);
            $query->bindValue(':occupation', $occupation);
            $query->bindValue(':address', $address);
            $query->bindValue(':id', $id);
            $result = $query->execute();
            if ($result) {
                $result = "<div class='alert alert-success'><strong>Success !</strong> Media Successfully Updated.</div>";
                return $result;
            } else {
                $result = "<div class='alert alert-danger'><strong>Error !</strong> Something Wrong, Please try again </div>";
                return $result;
            }
        }
    }

    // Delete = delete single column 
    public function delete($table, $id)
    {
           $sql = "DELETE FROM media WHERE id = ". $id;
          $query = $this->db->pdo->prepare($sql);
          if ($query->execute() == 1) {
              $result = "Users Delete Successfully";
          }
          return $result;

    }



}