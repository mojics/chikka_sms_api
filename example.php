<?php
/**
 * This file will show a simple implementation on how to send SMS using Chikka API
 * @author Ronald Allan Mojica
 * 
 */
include('ChikkaSMS.php');

$clientId = 'xxxxx';
$secretKey = 'xxxxxx';
$shortCode = 'xxxxxx';
$chikkaAPI = new ChikkaSMS($clientId,$secretKey,$shortCode);
$response = $chikkaAPI->sendText('1234561', '6391561866732', 'tests');

header("HTTP/1.1 " . $response->status . " " . $response->message);

exit($response->description);