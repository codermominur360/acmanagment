<?php
error_reporting(0);
include '../database/DBconnection.php';
$con = new Database();


class Person
{

    private $db;

    public function __construct()
    {
        // TODO: DB Connection
        $this->db = new Database();
    }

    public function index($table)
    {  
        $sql ="SELECT * FROM person 
        join media ON media.id = person.media_id
        join categories ON categories.id = person.cat_id"; 
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(); 
        return $results;
    }

    public function create($data)
    {
     
        $name = $data['pname'];
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
        $gender = $data['gender'];
        $result = null;

        if (strlen($name) < 3) {
            $result = "name too Short";
        } elseif ($father == '') {
            $result = " field  required";
        } elseif ($media_id == '' && $cat_id == '' ) {
            $result = "Forentar id emty";
        } else {

            $sql = "INSERT INTO person (p_name,father,p_address,univercity,department,semester,total_amt,due_amt,pay_amt,media_id,cat_id,gender) 
            VALUES(:pname,:father,:address,:univercity,:department,:semester,:total_amt,:due_amt,:pay_amt,:media_id,:cat_id,:gender)";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue('pname', $name);
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
            $query->bindValue('gender', $gender); 
            if ($query->execute() == 1) {
                $result = "Cadidate Added Successfully !";
            }
            return $result;
        }

    }

    
    public function details($table, $id)
    {
        $sql ="SELECT *  FROM ".$table." 
        JOIN media ON media.id = person.cat_id
        JOIN categories ON categories.id = person.cat_id 
        WHERE person.id = " . $id . " ORDER BY person.id LIMIT";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }


    public function edit($table, $id)
    {
        // $sql = "SELECT * FROM person 
        // JOIN categories ON categories.id = person.cat_id  
        // JOIN media ON media.id = person.media_id  
        // WHERE person.id = " . $id . "  LIMIT 1";
        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;

        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(); 
        return $results;

    }

    
    public function update($data)
    {
         $id = $data['id'];
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
        $gender = $data['gender']; 
        $result = null;

         
 
        $sql = " UPDATE person SET p_name = :name, father = :father, p_address = :address, univercity= :univercity,
         department= :department,semester= :semester,total_amt= :total_amt,due_amt= :due_amt,pay_amt= :pay_amt,
         media_id= :media_id,cat_id= :cat_id,gender= :gender  WHERE id =" . $id;
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':name', $name);
        $query->bindValue(':father', $father);
        $query->bindValue(':address', $address);
        $query->bindValue(':univercity', $univercity);
        $query->bindValue(':department', $department);
        $query->bindValue(':semester', $semester);
        $query->bindValue(':total_amt', $total_amt);
        $query->bindValue(':due_amt', $due_amt);
        $query->bindValue(':pay_amt', $pay_amt);
        $query->bindValue(':media_id', $media_id);
        $query->bindValue(':cat_id', $cat_id); 
        $query->bindValue(':gender', $gender);  
        if ($query->execute() == 1) {
            $result = "<div class='alert alert-success'><strong>Success !</strong> Candidate Successfully Updated.</div>";
            return $result;
        } else {
            $result = "<div class='alert alert-danger'><strong>Error !</strong> Something Wrong, Please try again </div>";
            return $result;
        }
         
    }


    public function delete($id,$table)
    {

        $sql = "DELETE FROM person WHERE id =:id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(':id', $id);
        if ($query->execute() == 1) {
            $result = "person Delete Successfully";
        }
        return $result;


    }

}