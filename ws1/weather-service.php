<?php 
require_once("lib/nusoap.php");

function getweather($city){ 
    $url = "http://api.openweathermap.org/data/2.5/weather?q="  .$city ."&appid=45c9191c3f83e1114c3ca70faae1c57c&units=imperial";
$json = file_get_contents($url);
$json = json_decode($json);
echo $json->results[0];
 $temp = $json->main->temp;
 $pressure = $json->main->pressure;
$humidity = $json->main->humidity;
 $weather = $json->weather[0]->main;
return array('temperature'=>$temp, 'weather'=>$weather, 'pressure'=>$pressure, 'humidity'=>$humidity); }

function gettemperature($city){
    return getweather($city)['temperature'];
}

$server = new nusoap_server();
 $server->configureWSDL('web service with  complex data type', 'urn:localhost');
 $server->wsdl->schemaTargetNamespace = 'urn:localhost';
$server->wsdl->addComplexType(
    'Info',
    'complexType', 
    'struct','all', 
    '',
    array(
        'temperature' => array('name' => 'temperature', 'type' => 'xsd:string'),
        'weather' => array('name' => 'weather', 'type' => 'xsd:string'),
        'pressure' => array('name' => 'pressure', 'type' => 'xsd:string'),
        'humidity' => array('name' => 'humidity', 'type' => 'xsd:string')) //tableau des elements 
);
$server->register('getweather',
array('city' => 'xsd:string', ),  
			array('return' => 'tns:Info'),  
			'urn:localhost',   
			'urn:localhost#loginServer',  
); 
$server->register('gettemperature',
array('city' => 'xsd:string', ),  
			array('return' => 'xsd:string'), 
			'urn:localhost',  
			'urn:localhost#loginServer', 
); 
$server->service(file_get_contents("php://input"));
?>
