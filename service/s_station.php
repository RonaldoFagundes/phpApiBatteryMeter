<?php



include 'controller/c_station.php';
include 'model/m_station.php';







  class S_Station
  {


    private $c_s = "";
    private $m_s = "";  




    function __construct()
    {      

        $this->c_s = new C_Station();
        $this->m_s = new M_Station();
    }



  
   public function listStation ()
   {
      if ( $this->m_s->selectStation($this->c_s) ) {
           return $this->c_s->getList();
      }else{
           return $this->c_s->getMsg();
      }
   }
  



   


  }