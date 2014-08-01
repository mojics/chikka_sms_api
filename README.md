Chikka API PHP Library
=========


Chikka API PHP Library is a simple yet rich featured php library that lets you use [CHIKKA SMS API][1].


Features
----
  - Ability to send SMS/Text
  - Receive an SMS
  - Reply 
  - Fetch sms notifications



Installation and sample usage
----

```sh
<?
include('ChikkaSMS.php');

$clientId = 'xxxxx';
$secretKey = 'xxxxxx';
$shortCode = 'xxxxxx';
$chikkaAPI = new ChikkaSMS($clientId,$secretKey,$shortCode);
$response = $chikkaAPI->sendText('UNIQUEMESSAGEID', 'MOBILENUMBER', 'YOURMESSAGE');
```


License
----

MIT


**Free Software, Hell Yeah!**
[1]:http://api.chikka.com