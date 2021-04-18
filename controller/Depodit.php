<?php
error_reporting(0);
include '../database/DBconnection.php';
$con = new Database(); 

class Dipodit
{

    private $db;

    public function __construct()
    {
        // TODO: DB Connection
        $this->db = new Database();
    }
    // name	share_no	sharevalues	creadit	debit	due	status	created_at

    public function index($table)
    {
       
        $sql = "SELECT dipodites.*,shareholders.s_name,sharevalue FROM `dipodites` JOIN shareholders ON shareholders.id = dipodites.name";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    public function create($data)
    { 
     
        $sharename = $data['sharename'];
        $creadit = $data['creadit'];
        $debit = $data['debit'];
        $due = $data['due'];
        $date = $data['date'];
        $result = null;

        if ($sharename == '' && $creadit == '' && $debit == '' && $due == ''  ) {
            $result = "Input Field Is Require ";
        }elseif (!preg_match("/[A-Za-z0-9]+/", $_POST['sharename'])) {
            $result = "The sharename provided is invalid";
        } else {
            try{
                $sql ="INSERT INTO dipodites (name,creadit,debit,due,date)VALUES(:sharename,:creadit,:debit,:due,:depodit_date)";
                $query = $this->db->pdo->prepare($sql);
                $query->bindValue('sharename', $sharename);
                $query->bindValue('creadit', $creadit);
                $query->bindValue('debit', $debit);
                $query->bindValue('due', $due);
                $query->bindValue('depodit_date', $date);
    
                if ($query->execute() == 1) {
                    $result = "Depodit Added";
                }
                return $result;
            }catch(PDOException $pdo_error) {
                throw new error("Failed to execute query:\n". $pdo_error->getMessage());
            }
            
        }


    }

    
    public function details($table, $name)
    { 
         
      
        $sql = "SELECT depodit_history.*,shareholders.s_name FROM depodit_history
                INNER JOIN shareholders ON shareholders.id =depodit_history.name
                 WHERE name= ".$name;
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }


    public function edit($table, $id)
    { 
        $sql = "SELECT * FROM dipodites  WHERE dipodites.name =".$id;
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    
    public function update($data)
    {
       
        $id = $data['id'];
        $sharename = $data['name'];
        $creadit = $data['creadit'];
        $debit = $data['debit'];
        $due = $data['due'];
        $result = null;

        if ($sharename == '') {
            $result = "Shrare Name too Short";
        } elseif ($creadit == '') {
            $result = "Creadit field  required";
        } elseif ($debit == '') {
            $result = "Debit field  required";
        } else {

           try{
            $sql = "UPDATE dipodites SET name= :sharename, creadit= :creadit, debit= :debit, due= :due WHERE id = :id";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':sharename', $sharename);
            $query->bindValue(':creadit', $creadit);
            $query->bindValue(':debit', $debit);
            $query->bindValue(':due', $due);
            $query->bindValue(':id', $id);

            if ($query->execute() == 1) { 
                $result = "Depodit it ok";
                $dipodit_id = $data['id'];
                $sharename = $data['name'];
                $creadit = $data['creadit'];
                $debit = $data['debit'];
                $due = $data['due'];
                $update_date = $data['update_date'];
                $result = null;

                $sql ="INSERT INTO depodit_history (dipodit_id,name,creadit,debit,due,update_date)VALUES(:dipodit_id,:sharename,:creadit,:debit,:due,:update_date)";
                $query = $this->db->pdo->prepare($sql);
                $query->bindValue('dipodit_id', $dipodit_id);
                $query->bindValue('sharename', $sharename);
                $query->bindValue('creadit', $creadit);
                $query->bindValue('debit', $debit);
                $query->bindValue('due', $due);
                $query->bindValue('update_date', $update_date);
    
                if ($query->execute() == 1) {
                    $result = "Depodit update";
                }
                return $result;
            }
            return $result;
           }catch(PDOException $e) {
            throw new error("Failed to execute query:\n". $e->getMessage());
            }
        }
    }


    public function delete($id,$table)
    {
        $sql = "DELETE FROM dipodites WHERE id =:id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(':id', $id);
        if ($query->execute() == 1) {
            $result = "Depodit Delete Successfully";
        }
        return $result;
    }


}