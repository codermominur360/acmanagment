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
        $sql ="SELECT person.*,media.m_name,categories.category FROM person 
        LEFT JOIN media ON media.id = person.media_id
        LEFT JOIN categories ON categories.id = person.cat_id"; 
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(); 
        return $results;
    }

    public function create($data)
    {    
        // print_r($data);
        // die();
        $name = $data['candidate_name'];
        $father = $data['father'];
        $address = $data['address'];
        $university = $data['university'];
        $department = $data['department'];
        $semester = $data['semester'];
        $total_amt = $data['total_amt'];
        $due_amt = $data['due_amt'];
        $pay_amt = $data['pay_amt'];
        $media_id = $data['media_id'];
        $cat_id = $data['cat_id'];
        $gender = $data['gender'];
        $p_phone = $data['p_phone'];
        $date = $data['date'];
        $result = null;

        if ($name == '' && $father == '' && $address == '' && $university == '' && $department == '' && $semester == ''
         && $total_amt == '' && $due_amt == '' && $pay_amt == '' && $media_id == '' && $cat_id == '' && $gender == '' && $p_phone == '' && $date == '' ) {
            $result = " fields  required";
        }elseif(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $p_phone)) {
            $result = " fields  required";
          } else {
              
            try{
                $sql = "INSERT INTO person (p_name, father, p_address, univercity, department, semester, total_amt, due_amt, pay_amt, media_id, cat_id, gender, p_phone,date) VALUES 
                (:candiName,:father,:address,:university,:department,:semester,:total_amt,:due_amt,:pay_amt,:media_id,:cat_id,:gender,:p_phone,:p_date)"; 
                $query = $this->db->pdo->prepare($sql);
                $query->bindValue('candiName', $name);
                $query->bindValue('father', $father);
                $query->bindValue('address', $address);
                $query->bindValue('university', $university );
                $query->bindValue('department', $department );
                $query->bindValue('semester', $semester );
                $query->bindValue('total_amt', $total_amt );
                $query->bindValue('due_amt', $due_amt );
                $query->bindValue('pay_amt', $pay_amt );
                $query->bindValue('media_id', $media_id );
                $query->bindValue('cat_id', $cat_id ); 
                $query->bindValue('gender', $gender ); 
                $query->bindValue('p_phone', $p_phone );  
                $query->bindValue('p_date', $date );  
                if ($query->execute() == 1) {
                    $result = "Create Person Successfully ";
                } 
            }catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
                return $result;
        }

    }

    
    public function details($table, $id)
    {
     
        $sql ="SELECT person.*,media.m_name,categories.category  FROM person 
        LEFT JOIN media ON media.id = person.media_id
        LEFT JOIN categories ON categories.id = person.cat_id 
        WHERE person.id = " . $id . " ORDER BY person.id LIMIT 1";
        
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }


    public function edit($table, $id)
    {  
        // $sql = "SELECT person.*,categories.category,media.m_name FROM person 
        // JOIN categories ON categories.id = person.cat_id  
        // JOIN media ON media.id = person.media_id  
        // WHERE person.id = " . $id . "  LIMIT 1";  
        $sql = "SELECT * FROM person WHERE id = " . $id . "  LIMIT 1";  
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(); 
        return $results;

    }

    
    public function update($data)
    {    
         $id = $data['id'];
         $name = $data['p_name'];
         $father = $data['father'];
         $address = $data['address'];
         $university = $data['university'];
         $department = $data['department'];
         $semester = $data['semester'];
         $total_amt = $data['total_amt'];
         $due_amt = $data['due_amt'];
         $pay_amt = $data['pay_amt'];
         $media_id = $data['media_id'];
         $cat_id = $data['cat_id'];
         $gender = $data['gender'];
         $p_phone = $data['p_phone'];
         $date = $data['date'];
         $result = null;
 
         if ($name == '' && $father == '' && $address == '' && $university == '' && $department == '' && $semester == ''
          && $total_amt == '' && $due_amt == '' && $pay_amt == '' && $media_id == '' && $cat_id == '' && $gender == '' && $p_phone == ''&& $date == '' ) {
             $result = " fields  required";
         } else {
               
             try{
                    $sql = "UPDATE person SET p_name=:candiName, father=:father, p_address=:address, univercity=:university, department=:department, semester=:semester, total_amt=:total_amt, due_amt= :due_amt, pay_amt=:pay_amt, media_id=:media_id, cat_id=:cat_id, gender=:gender, p_phone=:p_phone, date=:p_date WHERE id =:id";
                    $query = $this->db->pdo->prepare($sql);
                    $query->bindValue('candiName', $name);
                    $query->bindValue('father', $father);
                    $query->bindValue('address', $address);
                    $query->bindValue('university', $university );
                    $query->bindValue('department', $department );
                    $query->bindValue('semester', $semester );
                    $query->bindValue('total_amt', $total_amt );
                    $query->bindValue('due_amt', $due_amt );
                    $query->bindValue('pay_amt', $pay_amt );
                    $query->bindValue('media_id', $media_id );
                    $query->bindValue('cat_id', $cat_id ); 
                    $query->bindValue('gender', $gender ); 
                    $query->bindValue('p_phone', $p_phone );  
                    $query->bindValue('p_date', $date );  
                    $query->bindValue('id', $id);
    
                    if ($query->execute() == 1) {
                        $result = "Update Person Successfully ";
                    } 
                }catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
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