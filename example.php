<?php
/**
 * This file will show a simple implementation of Chikka API SMS library
 * @author Ronald Allan Mojica
 * 
 */
include('ChikkaSMS.php');

$clientId = 'xxxxx';
$secretKey = 'xxxxxx';
$shortCode = 'xxxxxx';
$chikkaAPI = new ChikkaSMS($clientId,$secretKey,$shortCode);
$response = $chikkaAPI->sendText('1234561', '6391561866732', 'tests');


//if($response->status != 200){
	header("HTTP/1.1 " . $response->status . " " . $response->message);
//}

echo $response->description;

?>