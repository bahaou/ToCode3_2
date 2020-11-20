<form  method="post">
    <h4> enter a city name : </h4>
    <input type="text" id="getcity" name="getcity" value="" >
    <input type="submit" value="get temperature">
    
</form>
<?php
require_once('lib/nusoap.php');
$wsdl = "http://localhost/ToCode3_2/ws1/weather-service.php?wsdl";
$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) {
   echo '<h2>L\'erreur!</h2>' . $err;
   exit();
}
$r ='';
if ($_POST['getcity'] !=''){
$r=$client->call('gettemperature', array('city'=>$_POST['getcity']));

}
    if($r != ''){
    $error  = '';
	$guest= " Web";
	$wsdl = "http://webservices.daehosting.com/services/TemperatureConversions.wso?WSDL";
    $client2 = new nusoap_client($wsdl, true);
		if(!$error){
			$err = $client2->getError();
			if ($err) {
			    exit();
			}
			 try {
				$result2 = $client2->call('FahrenheitToCelsius', array('nFahrenheit'=>$r));
				echo 'The temperature in '.$_POST['getcity'].' is '.$result2['FahrenheitToCelsiusResult'].' celsius.';
                }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			                         }
		          }	
    }
?>



