<?php
require('Equation.php');
$options = array("uri" => "http://localhost");
$server = new SoapServer(null, $options);
$server->setClass('Equation'); 
$server->handle();
?>


