<?php
/**
 * This file will show a simple implementation of Chikka API SMS library
 * @author Ronald Allan Mojica
 * 
 */
include('ChikkaSMS.php');

$chikkaAPI = new ChikkaSMS();
$chikkaAPI->sendText('12345', '09156186673', 'test');
?>
