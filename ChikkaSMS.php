<?php

/**
 * Class ChikkaSMS Class handles the methods and properties of sending or receiving an SMS message.
 * The main inspiration of this class was from Nexmo PHP Library
 * 
 * Usage: $var = new NexoMessage ( $account_key, $account_password );
 * Methods:
 *      
 *      sendText()
 *      receiveTxt()
 *      reply()
 *      fetchNotifications()
 *      
 *     sendText ( $to, $from, $message, $unicode = null )
 *     pushWap ( $to, $from, $title, $url, $validity = 172800000 )
 *     displayOverview( $nexmo_response=null )*     
 *     inboundText ( $data=null )
 *     reply ( $text )
 *     
 *
 */

/**
 * Description of ChikkaSMS
 *
 * @author kcmojica
 */
class ChikkaSMS {

    //put your code here
    private $clientId = '';
    private $secretKey = '';
    private $shortCode = '';
    //Chikka's default URI for sending SMS
    const ChikkaSendUrl = 'https://post.chikka.com/smsapi/request';
    const SendRequest = 'send';
    const ReceiveRequest = 'incoming';
    const ReplyRequest = 'reply';
    const NotificationRequest = 'outgoing';
    
    
    
    
    /**
     * SendText allows sending of SMS message to Chikka API
     * @param type $requestId
     * @param type $to
     * @param type $message
     */
    public function sendText($requestId, $to, $message) {
        $requestId = strip_tags($requestId);
        echo $to;
        echo $message;

        //Request ID should not be blank
        if(strlen($requestId) < 1){
            trigger_error('Request ID is required');
            return false;
        }
        
        // Making sure strings are UTF-8 encoded
        if (!is_numeric($to) && !mb_check_encoding($to, 'UTF-8')) {
            trigger_error('TO needs to be a valid UTF-8 encoded string');
            return false;
        }

        if (!mb_check_encoding($message, 'UTF-8')) {
            trigger_error('Message needs to be a valid UTF-8 encoded string');
            return false;
        }
        
        //urlencode 
        $message = urlencode($message);
        
        

    }

    public function receiveText() {
        
    }

    public function reply() {
        
    }

    public function fetchNotifications() {
        
    }

}

?>
