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




 public function insertAnalysis(C_Analysis $c_a):bool
 {  
    $query = "INSERT INTO tb_analysis(tensao_anl, corrente_anl, temperatura_anl, obs_anl, date_anl, time_anl, fk_bty)
    VALUES(:ten, :cor, :tem, :obs, :date, :time, :fk);";
           
      $sql = $this->pdo->prepare($query);   
      $sql->bindValue(':ten', $c_a->getTensao()); 
      $sql->bindValue(':cor', $c_a->getCorrente());
      $sql->bindValue(':tem', $c_a->getTemperatura());
      $sql->bindValue(':obs', $c_a->getObs());
      $sql->bindValue(':date',$c_a->getDate());
      $sql->bindValue(':time',$c_a->getTime());
      $sql->bindValue(':fk',  $c_a->getFkBty());
            
       if ( $sql->execute() ) {         
         return true;
       } else {         
         return false;             
       } 
       
  }


 


}