<?php

require_once 'conn.php';

class M_Station extends Conn
{


  private $conn = "";
  private $pdo = "";


    function __construct()
    {
         $this->conn = new Conn();
         $this->pdo = $this->conn->pdo();
    }





  /*
  public function selectStation(C_Station $c_s)
  {

 $query = "SELECT * FROM tb_station;" ;
      
      $sql = $this->pdo->prepare($query);    
      $sql->execute();

      if ($sql->rowCount() > 0) {

        $list_station = array();

        while ($stations = $sql->fetchAll(PDO::FETCH_ASSOC)) {
             $list_station = $stations;
        }

        $c_s->setList($list_station);
        return true;
       
     }else{ 

        $c_s->setMsg("notfound");
        return false; 
     }


  }
 */


}