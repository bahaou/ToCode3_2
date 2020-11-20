<form  method="post">
    <h4> enter a city name : </h4>
    <input type="text" id="getcountry" name="getcountry" value="" >
    <input type="submit" value="get">
    
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
if ($_POST['getcountry'] !=''){
$result=$client->call('getweather', array('city'=>$_POST['getcountry']));
$r =  ($result['temperature']);
}
    if($r != ''){
    echo 'The temperature in '.$_POST['getcountry'].' is '.$r.' fahrenheit.';
    }
?>



