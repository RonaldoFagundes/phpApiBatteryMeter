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

 /*
 $query = "SELECT tb_battery.id_bty, tb_battery.tensao_bty, tb_battery.condutancia_bty, tb_battery.obs_bty, 
 tb_analysis.date_anl FROM tb_battery LEFT JOIN tb_analysis ON  id_bty = fk_bty;";
  */    
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

        $c_b->setMsg("notfound");
        return false; 
     }


  }






  public function insertBattery(C_Battery $c_b)  {

    $query = "INSERT INTO tb_battery(tensao_bty, condutancia_bty, update_bty, obs_bty)VALUES(:ten, :con, :upd, :obs)" ;
          
      $sql = $this->pdo->prepare($query);   
      $sql->bindValue(':ten', $c_b->getTensao()); 
      $sql->bindValue(':con', $c_b->getCondutancia());
      $sql->bindValue(':upd',$c_b->getDate()); 
      $sql->bindValue(':obs', $c_b->getObs());     
         
      
       if ( $sql->execute() ) {
         $c_b->setMsg("success");
       } else {
         $c_b->setMsg("error");             
       } 

  }







   public function updatetBattery(C_Battery $c_b)
  {   
   $query = "UPDATE tb_battery SET tensao_bty=:ten, condutancia_bty=:con, update_bty=:upd , obs_bty=:obs  WHERE id_bty=:id" ;

       $sql = $this->pdo->prepare($query);
     
       $sql->bindValue(':ten', $c_b->getTensao());
       $sql->bindValue(':con', $c_b->getCondutancia());
       $sql->bindValue(':upd', $c_b->getDate()); 
       $sql->bindValue(':obs', $c_b->getObs());             
       $sql->bindValue(':id',  $c_b->getId());
  
       if ( $sql->execute() ) {
        $c_b->setMsg("success");
       } else {
        $c_b->setMsg("error");             
     }
  }



}