<?php

include 'service/s_analysis.php';


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application");
header("Content-Type: application/json; charset=utf-8");


$s_a = new S_Analysis();


$response_json = file_get_contents("php://input");
$data = json_decode($response_json, true);



if($_GET['action'] === 'list_battery'){
   
   echo json_encode($s_a->listBattery());

}else if($_GET['action'] === 'list_analysis_by_fk'){

   $fk = $data['fkStation'];   
   echo json_encode($s_a->listAnalysisByFk($fk)); 


}else if($_GET['action'] === 'insert_meter'){
 
    $array_meter = [
          $data['meter']['volt'],  
          $data['meter']['res'],           
          $data['meter']['temp'],         
          $data['meter']['fk'],
          $data['meter']['new'],
    ]; 
       
    echo json_encode($s_a->insertMeter($data));

}


