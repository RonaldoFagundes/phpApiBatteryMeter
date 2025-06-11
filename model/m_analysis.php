<?php

require_once 'conn.php';

class M_Analysis extends Conn
{


  private $conn = "";
  private $pdo = "";


    function __construct()
    {
         $this->conn = new Conn();
         $this->pdo = $this->conn->pdo();
    }






  public function selectAnalysis(C_Analysis $c_a):bool
  {

 $query = "SELECT * FROM tb_analysis;" ;
      
      $sql = $this->pdo->prepare($query);    
      $sql->execute();

      if ($sql->rowCount() > 0) {

        $list_analysis = array();

        while ($analysis = $sql->fetchAll(PDO::FETCH_ASSOC)) {
             $list_analysis = $analysis;
        }

        $c_a->setList($list_analysis);
        return true;
       
     }else{ 

        $c_a->setMsg("not found");
        return false; 
     }


  }




   public function selectAnalysisByFk(C_Analysis $c_a):bool
  {

 $query = "SELECT * FROM tb_analysis WHERE fk_bty= :fk;" ;
      
    

      $sql = $this->pdo->prepare($query);   
      $sql->bindValue(':fk', $c_a->getFkBty()); 
      $sql->execute();
      


      if ($sql->rowCount() > 0) {

        $list_analysis = array();

        while ($analysis = $sql->fetchAll(PDO::FETCH_ASSOC)) {
             $list_analysis = $analysis;
        }

        $c_a->setList($list_analysis);
        return true;
       
     }else{ 

        $c_a->setMsg("notfound");
        return false; 
     }


  }



}