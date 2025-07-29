<?php

include 'controller/c_battery.php';
include 'model/m_battery.php';

include 'controller/c_analysis.php';
include 'model/m_analysis.php';




  class S_Analysis
  {

    private $c_a = "";
    private $m_a = "";  

    private $c_b = "";
    private $m_b = "";  






    function __construct()
    {      

        $this->c_a = new C_Analysis();
        $this->m_a = new M_Analysis();

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




   public function listAnalysisByFk ($fk)
   {      
      $this->c_a->setFkBty($fk);

      if ( $this->m_a->selectAnalysisByFk($this->c_a) ) {
           return $this->c_a->getList();
      }else{
           return $this->c_a->getMsg();
      }
   }





   public function insertMeter ($data)   {  
     
      //$date = date('d-m-Y');
      //$date = date('Y-m-d');
      $date = date('2025-07-17');
      $time = date('H:i');

      $condutancia = 3989;

      if( $data['meter']['fk']){

         $this->c_b->setTensao($data['meter']['volt']);
         $this->c_b->setCondutancia($condutancia); 
         $this->c_b->setDate($date);

         if( $data['meter']['new'] == 0){

            $this->c_a->setDate($date);
            $this->c_a->setTime($time);
            $this->c_a->setTensao($data['meter']['volt']);
            $this->c_a->setCorrente($data['meter']['res']);      
            $this->c_a->setTemperatura($data['meter']['temp']); 
            $this->c_a->setObs("Read");     
            $this->c_a->setFkBty($data['meter']['fk']);

            $this->c_b->setObs("Read");            
            $this->c_b->setId($data['meter']['fk']);

            
            if($this->m_a->insertAnalysis($this->c_a)){
                $this->m_b->updatetBattery($this->c_b);
                return $this->c_b->getMsg();
            }

         }else{

            $this->c_b->setObs("Install"); 
            $this->m_b->insertBattery($this->c_b); 
            return $this->c_b->getMsg();

         }
      
   }  

}








}