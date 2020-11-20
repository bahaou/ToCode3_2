<?php
require_once('lib/nusoap.php');
	$error  = '';
	$result = array();
	$result_complex = array();
	$guest= " Web";
	$wsdl = "http://webservices.daehosting.com/services/TemperatureConversions.wso?WSDL";
		if(!$error){
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
			    exit();
			}
			 try {
				$result = $client->call('FahrenheitToCelsius', array('nFahrenheit'=>70));
				echo "<h2>Result<h2/>";
				print_r($result['FahrenheitToCelsiusResult']);
 }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}	

?>







