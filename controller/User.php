<?php
error_reporting(0);
include '../database/Database.php';
$con = new Database();

class User
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
        $fullname = $data['fullname'];
        $username = $data['username'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password = $data['password'];
        $result = null;

        if (strlen($username) < 3) {
            $result = "username too Short";
        } elseif ($fullname == '') {
            $result = " field  required";
        } elseif ($email == '' && $phone == '' ) {
            $result = "Email and Phone Nubmer must be";
        } else {
            
            $sql = "INSERT INTO users (fullname,username,email	,phone,	password) VALUES(:fullname, :username,:email, :phone, :password)";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue('fullname', $fullname);
            $query->bindValue('username', $username);
            $query->bindValue('email', $email);
            $query->bindValue('phone', $phone);
            $query->bindValue('password', $password);
            if ($query->execute() == 1) {
                $result = "User Added";
            }
            return $result;
        }

    }

    
    public function details($table, $id)
    {
        $sql = "SELECT person.*, categories.category ,media.name as media_name FROM person 
        JOIN categories ON categories.id = person.cat_id ; 
        JOIN media ON media.id = person.cat_id
        WHERE ".$table.".id = ".$id ;
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }


    public function edit($table, $id)
    {
        $sql = "SELECT person.*, categories.category ,media.name as media_name FROM person 
        JOIN media ON media.id = person.cat_id
        JOIN categories ON categories.id = person.cat_id 
        WHERE person.id = " . $id . " ORDER BY person.id LIMIT 1"; 
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;

    }

    
    public function update($data)
    {
       
        $name = $data['name'];
        $father = $data['father'];
        $address = $data['address'];
        $univercity = $data['univercity'];
        $department = $data['department'];
        $semester = $data['semester'];
        $total_amt = $data['total_amt'];
        $due_amt = $data['due_amt'];
        $pay_amt = $data['pay_amt'];
        $media_id = $data['media_id'];
        $cat_id = $data['cat_id'];
        $result = null;

        if (strlen($name) < 3) {
            $result = "name too Short";
        } elseif ($father == '') {
            $result = " field  required";
        } elseif ($media_id == '' && $cat_id == '' ) {
            $result = "Forentar id emty";
        } else {

            $sql = "UPDATE person SET name =:name,father =:father,address = :addres,univercity= :univercity, department=:department,semester= :semester,total_amt= :total_amt,due_amt= :due_amt,pay_amt=:pay_amt,media_id= :media_id,cat_id= :cat_id, WHERE id= :id";
            $query = $this->db->pdo->prepare($sql);
            
            $query->bindValue('name', $name);
            $query->bindValue('father', $father);
            $query->bindValue('address', $address);
            $query->bindValue('univercity', $univercity);
            $query->bindValue('department', $department);
            $query->bindValue('semester', $semester);
            $query->bindValue('total_amt', $total_amt);
            $query->bindValue('due_amt', $due_amt);
            $query->bindValue('pay_amt', $pay_amt);
            $query->bindValue('media_id', $media_id);
            $query->bindValue('cat_id', $cat_id);  
            if ($query->execute() == 1) {
                $result = "Person Update";
            }else{
                $result ="Not updates";
            }
            return $result;
        }
        
    }


    public function delete($id,$table)
    {
          $sql = "DELETE FROM person WHERE id=:id";
          $query = $this->db->pdo->prepare($sql);
          if ($query->execute() == 1) {
              $result = "person Delete Successfully";
          }
          return $result;

    }

}