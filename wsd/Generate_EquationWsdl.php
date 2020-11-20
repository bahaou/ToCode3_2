<?php
require "php2wsdl/src/PHPClass2WSDL.php";
require "vendor/autoload.php"; 
$class="Equation";
$serviceURI="http://localhost/ToCode3_2/wsd/Equation-server.php";
$expectedFile="Equation.wsdl";
require "Equation.php";
$gen = new \PHP2WSDL\PHPClass2WSDL($class, $serviceURI);
$gen->generateWSDL();
file_put_contents($expectedFile, $gen->dump());
echo "Generated WSDL:";
echo "<a href='http://localhost/ToCode3_2/wsd/$expectedFile'>$expectedFile</a><br/>";
?>