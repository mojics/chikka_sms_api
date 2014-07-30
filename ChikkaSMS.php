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
    private $chikkaSendUrl = 'https://post.chikka.com/smsapi/request';
    
    private $sendRequest = 'send';
    private $receiveRequest = 'incoming';
    private $replyRequest = 'reply';
    private $notificationRequest = 'outgoing';
    
    /**
     * SendText allows sending of SMS message to Chikka API
     * @param type $requestId
     * @param type $to
     * @param type $message
     */
    public function sendText($requestId, $to, $message ){
        
    }
    
    public function receiveText(){
        
    }
    
    public function reply(){
        
    }
    
    public function fetchNotifications(){
        
    }
    
}

?>
