<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application");
header("Content-Type: application/json; charset=utf-8");

include 'service/s_station.php';
include 'service/s_battery.php';
include 'service/s_analysis.php';


$s_s = new S_Station();
$s_b = new S_Battery();
$s_a = new S_Analysis();

$response_json = file_get_contents("php://input");
$data = json_decode($response_json, true);




if($_GET['action'] === 'default'){

   echo json_encode("it works");

}else if($_GET['action'] === 'list_station'){

   echo json_encode($s_s->listStation());   

}else if($_GET['action'] === 'list_battery'){

   echo json_encode($s_b->listBattery());

}else if($_GET['action'] === 'list_analysis'){

   echo json_encode($s_a->listAnalysis()); 

}else if($_GET['action'] === 'list_analysis_by_fk'){

   $fk = $data['fkStation'];
   echo json_encode($s_a->listAnalysisByFk($fk)); 
}


/*
//if(['/']){


if($_GET['action'] === 'default'){

   echo json_encode("it works");

}else if($_GET['action'] === 'list_station'){

   echo json_encode($s_s->listStation());   

}else if($_GET['action'] === 'get_place'){
       
   // o hardware envia o dados para o banco     
   $info_station = [

     [
     'id'  => 1, 
     'street_plc'  => "Rua Miguel Angelo",
     "ref_plc"  => "l5q63", 
     "region_plc"  => "Cidade Alta"      
     ],

     [
      'id'  => 2, 
      'street_plc'  => "Rua Horizonte",
      "ref_plc"  => "l26q9", 
      "region_plc"  => "São Vicente"      
      ],
   ];


   echo json_encode($info_station);

  
}else if($_GET['action'] === 'switch-hardware'){
  
   // enviar o sinal para o hardware via rede 
   // $electron_sign = $data['electron_sign'];

    $id = $data['idPlace'];

   echo json_encode($id);




}else if($_GET['action'] === 'data_send'){   
   



   $array_meter = [      
      $data['meter']['volt'],  
      $data['meter']['current'], 
      $data['meter']['temp'],  
      $data['meter']['soh'],
      $data['meter']['fk_sta'],
    ];




   $array_meter = [      
      $data['meter']['volt'],  
      $data['meter']['temp'],  
      $data['meter']['rest'],
      $data['meter']['fk'],
    ];



   echo json_encode($array_meter); 


}else if($_GET['action'] === 'get-info'){
 
    $ampere ;

    // potênia 
    $watt ;

    / tensao/
    $volt = 12;
   
    
    //Ah = Wh / V. 
    // $ampere = $watt / $volt;

    $watt = $volt * $ampere;


    $soh ;
    $current_capacity = 80;
    $nominal_capacity = 100;


   // SOH = (Capacidade Atual / Capacidade Nominal) * 100%         
     $soh =  ($current_capacity / $nominal_capacity);


     
    // o hardware lê os valores dos pinos 
    $pin_volts = 10;
    $pin_temp  = 22;
   
   
       // valores ideais 
          
        // temperatura ambiente de 25°C 
          
       




   // o hardware faz o calculo 
    if( $soh > 100 ){
       
    // o hardware envia o dados para o banco     
     $list_string = [
      [
      "id"  =>1, 
      "volt"  => $pin_volts,
      "temp"  => $pin_temp, 
      "rest"  => 6, 
      "equalize"=>false,
      "status"=> false,
      "msg"=> "Atenção",
      "fk" =>1
      ],
   ];

    }else{    

     $list_string = [
      [
      "id"  =>1, 
      "volt"  => $pin_volts,
      "temp"  => $pin_temp, 
      "rest"  => 6, 
      'equalize'=>true,
      "status"=> true,
      "msg"=> "Bom estado",
      "fk" =>1
      ],
   ];


  }

   
    echo json_encode($list_string); 

}










else if($_GET['action'] === 'list') {
 
 $list_string = [
         [
         'id'  =>1, 
         'volt'  => 12,
         "temp"  => 20, 
         "rest"  => 6, 
         'equalize'=>true,
         "status"=> true,
         ],

         [
            'id'  =>2, 
            'volt'  => 11,
            "temp"  => 22, 
            "rest"  => 5, 
            'equalize'=>false,
            "status"=> false,
         ],

         [
            'id'  =>3, 
            'volt'  => 11,
            "temp"  => 22, 
            "rest"  => 5, 
            'equalize'=>false,
            "status"=> false,
         ],

         [
            'id'  =>4, 
            'volt'  => 13,
            "temp"  => 18, 
            "rest"  => 4.5, 
            'equalize'=>true,
            "status"=> true,
         ]

 ];

 echo json_encode($list_string); 

}
*/