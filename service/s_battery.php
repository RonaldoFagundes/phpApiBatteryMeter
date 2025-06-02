<?php



include 'controller/c_battery.php';
include 'model/m_battery.php';







  class S_Battery
  {


    private $c_b = "";
    private $m_b = "";  




    function __construct()
    {      

        $this->c_b = new C_Battery();
        $this->m_b = new M_Battery();
    }




   public function listBattery ()
   {
      if ( $this->m_b->selectBattery($this->c_b) ) {
           return $this->c_b->getList();
      }else{
           return $this->c_b->getMsg();
      }
   }




   


  }