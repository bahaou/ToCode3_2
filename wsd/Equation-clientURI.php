<?php
$options = array(
	"location" => "http://localhost/ToCode3_2/wsd/Equation-server.php",
	"uri" => "http://localhost",
	'trace' => 1);
try {  
$client = new SoapClient(null, $options); 
$a=1;
$b=2;
$c=1;
$result = $client->solve($a,$b,$c); 
echo '<br/><h1>Service response</h1>';
$t= count($result);
    echo "Equation ".$a."x²+".$b."x+".$c;
    if ($t==0){
        echo " n'a pas de solution!";
    }
    if ($t==1){
        echo " a une seule solution x=".$result[0];
    }
    if ($t==2){
        echo " a 2 solutions x1=".$result[0]." , x2=".$result[1];
    }
} 
catch (SoapFault $e) {
    echo '<br/><h1>Error: </h1>';
var_dump($e); 
}
	echo '<br/><h1>SOAP Request</h1>'.htmlspecialchars($client->__getLastRequest()).'<br/>';
	echo '<br/><h1>SOAP Response </h1>'.htmlspecialchars($client->__getLastResponse()).'<br/>';
 
?>