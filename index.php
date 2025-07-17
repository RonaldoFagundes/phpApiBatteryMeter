<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application");
header("Content-Type: application/json; charset=utf-8");



include 'service/s_analysis.php';

$s_a = new S_Analysis();

$response_json = file_get_contents("php://input");
$data = json_decode($response_json, true);

/*
if(['/']){  
   echo json_encode("it works empty ");
*/

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
          $data['meter']['new'],
          $data['meter']['fk'],
    ]; 
   //echo json_encode($s_a->insertMeter($data));    
    echo json_encode($data);     
}








/*    
}else if($_GET['action'] === 'cad_battery'){

   $battery = [     
     'tensao'  => 2.27,
     "corrente"  => 5.2, 
     "temperatura"  => 23,
     "obs"  => "new battery ",
     "date" =>  date('d-m-Y'),
     "time" =>  date('H:i'),
     "latencia"=>1.0005,
     'fk'  => 1, 
   ];

   echo json_encode($battery);  


}else if($_GET['action'] === 'get_data_hardware'){

   $info_station = [
     [
     'fk'  => 1, 
     'tensao'  => 2.27,
     "corrente"  => 5.2, 
     "temperatura"  => 23,
     "latencia"=>1.0007 ,    
     ],
     [
     'fk'  => 2, 
     'tensao'  => 2.28,
     "corrente"  => 4.7, 
     "temperatura"  => 23,
     "latencia"=>1.0205 ,           
     ],
   ];
    
  for($i = 0; $i < count($info_station); $i++){

   $analys = [     
      "battery"=>$info_station[$i]['fk'],
      "condutancia"=>$info_station[$i]['tensao'] * $info_station[$i]['corrente'],            
      "obs"  => "Read test battery ".$info_station[$i]['fk'],
      "date" =>  date('d-m-Y'),
      "time" =>  date('H:i'), 
      "sign"=> $info_station[$i]['latencia'] / 1.000 , 
    ];   

     // echo json_encode($analys);   
      print_r  ($analys); 
   }  
 
    //
    $analys = [
     [
      "battery"=>$info_station[0]['fk'],
      "condutancia"=>$info_station[0]['tensao'] * $info_station[0]['corrente'],
      "sign"=>$info_station[0]['latencia'] / 1000, 
     ],

      [
      "battery"=>$info_station[1]['fk'],
      "condutancia"=>$info_station[1]['tensao'] * $info_station[1]['corrente'],
      "sign"=>$info_station[1]['latencia'] / 1000, 
     ],
    ];

    echo json_encode($analys);   
    //
 */







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