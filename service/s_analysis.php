<?php



include 'controller/c_analysis.php';
include 'model/m_analysis.php';

include 'service/s_battery.php';





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



   /*
   public function statusHardware()
   { 
       $hardware = "bad";       
       $this->c_b->setHardware($hardware);       
   }
  */




   public function insertMeter ($data)
   {  
      //$date = date('d-m-Y');
      $date = date('Y-m-d');
      $time = date('H:i');

      if($data['meter']['new']==true){
         $obs = "Install";
      }else{
         $obs = "Read";
      }

      
      
      // logica
      $tensao = $data['meter']['volt'] ;
      $corrente = $data['meter']['volt'] * $data['meter']['res'] ;

      $condutancia = 3989;      

      // sentData to controller
      $this->c_b->setTensao($tensao);      
      $this->c_b->setCondutancia($condutancia); 
      $this->c_b->setDate($date);
      $this->c_b->setId($data['meter']['fk']);
      $this->c_b->setObs($obs);           

       
      $this->c_a->setDate($date);
      $this->c_a->setTime($time);
      $this->c_a->setTensao($tensao);
      $this->c_a->setCorrente($corrente);      
      $this->c_a->setTemperatura($data['meter']['temp']);      
      $this->c_a->setFkBty($data['meter']['fk']);
     
      /*
      $this->m_a->insertAnalysis($this->c_a);

      $this->m_b->updateBattery($this->c_b); 
      $this->m_b->insertBattery($this->c_b); 
      */

   }






   /*
    public function listAnalysisLastByFk ($fk)
   {
      
      $this->c_a->setFkBty($fk);

      if ( $this->m_a->selectAnalysisLastByFk($this->c_a) ) {
           return $this->c_a->getList();
      }else{
           return $this->c_a->getMsg();
      }
   }
   */


    /*
    public function listAnalysisByDate ($data)
   {      
      $this->c_a->setFkBty($data['analysi']['fk']);
      $this->c_a->setDate($data['analysi']['date']);

      if ( $this->m_a->selectAnalysisByDate($this->c_a) ) {
           return $this->c_a->getList();
      }else{
           return $this->c_a->getMsg();
      }
   }
   */

   
   /*
    public function listAnalysisByDate2 ($fk, $datea)
   {      
      $this->c_a->setFkBty($fk);
      $this->c_a->setDate($datea);

      if ( $this->m_a->selectAnalysisByDate($this->c_a) ) {
           return $this->c_a->getList();
      }else{
           return $this->c_a->getMsg();
      }
   }
   */

   


  }