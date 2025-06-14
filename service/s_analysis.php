<?php



include 'controller/c_analysis.php';
include 'model/m_analysis.php';







  class S_Analysis
  {


    private $c_a = "";
    private $m_a = "";  




    function __construct()
    {      

        $this->c_a = new C_Analysis();
        $this->m_a = new M_Analysis();
    }



 /*
   public function listAnalysis ()
   {
      if ( $this->m_a->selectAnalysis($this->c_a) ) {
           return $this->c_a->getList();
      }else{
           return $this->c_a->getMsg();
      }
   }
*/

   public function listAnalysisByFk ($fk)
   {
      
      $this->c_a->setFkBty($fk);

      if ( $this->m_a->selectAnalysisByFk($this->c_a) ) {
           return $this->c_a->getList();
      }else{
           return $this->c_a->getMsg();
      }
   }


    public function listAnalysisLastByFk ($fk)
   {
      
      $this->c_a->setFkBty($fk);

      if ( $this->m_a->selectAnalysisLastByFk($this->c_a) ) {
           return $this->c_a->getList();
      }else{
           return $this->c_a->getMsg();
      }
   }


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


   


  }