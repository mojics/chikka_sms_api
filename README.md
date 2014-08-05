Chikka API PHP Library
=========


Chikka API PHP Library is a simple yet rich featured php library that lets you use [CHIKKA SMS API][1] and [here][2].


Features
----
  - Ability to send SMS/Text
  - Receive an SMS
  - Reply 
  - Fetch sms notifications



Installation and sample usage
----


#### Send SMS
```sh
<?php
include('ChikkaSMS.php');

$clientId = 'xxxxx';
$secretKey = 'xxxxxx';
$shortCode = 'xxxxxx';
$chikkaAPI = new ChikkaSMS($clientId,$secretKey,$shortCode);
$response = $chikkaAPI->sendText('UNIQUEMESSAGEID', 'MOBILENUMBER', 'YOURMESSAGE');
```


#### Receive notifications from Chikka

```sh
<?php
include('ChikkaSMS.php');
$clientId = 'xxxxx';
$secretKey = 'xxxxxx';
$shortCode = 'xxxxxx';
$chikkaAPI = new ChikkaSMS($clientId, $secretKey, $shortCode);

if($_POST){
    
    if ($chikkaAPI->receiveNotifications() === null) {
            header("HTTP/1.1 400 Error");
            echo "Message has not been processed.";
        }
    else{
        echo "Message has been successfully processed.";
    }
    var_dump($chikkaAPI->receiveNotifications());
}



 ```

License
----

MIT


**Free Software, Hell Yeah!**
[1]:http://api.chikka.com
[2]:http://ronaldmojica.blogspot.com