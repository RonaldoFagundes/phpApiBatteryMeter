<?php

require_once 'conn.php';

class M_Battery extends Conn
{


  private $conn = "";
  private $pdo = "";


    function __construct()
    {
         $this->conn = new Conn();
         $this->pdo = $this->conn->pdo();
    }






  public function selectBattery(C_Battery $c_b):bool
  {

 $query = "SELECT * FROM tb_battery;" ;
      
      $sql = $this->pdo->prepare($query);    
      $sql->execute();

      if ($sql->rowCount() > 0) {

        $list_battery = array();

        while ($batterys = $sql->fetchAll(PDO::FETCH_ASSOC)) {
             $list_battery = $batterys;
        }

        $c_b->setList($list_battery);
        return true;
       
     }else{ 

        $c_b->setMsg("not found");
        return false; 
     }


  }



}