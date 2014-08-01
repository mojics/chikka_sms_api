<?php

/**
 * Class ChikkaSMS Class handles the methods and properties of sending or receiving an SMS message.
 * The main inspiration of this class was from Nexmo PHP Library
 * 
 * Usage: $var = new NexoMessage ( $account_key, $account_password );
 * Methods:
 *      
 *      sendText($requestId, $to, $message)
 *      receiveTxt()
 *      reply()
 *      fetchNotifications()
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
    private $sslVerify = false;
    //Chikka's default URI for sending SMS
    private $chikkaSendUrl = 'https://post.chikka.com/smsapi/request';
    
    private $sendRequest = 'send';
    private $receiveRequest = 'incoming';
    private $replyRequest = 'reply';
    private $notificationRequest = 'outgoing';
    
    
    /**
     * [__construct description]
     * @param [type] $clientId  [description]
     * @param [type] $secretKey [description]
     * @param [type] $shortCode [description]
     */
    public function __construct($clientId, $secretKey, $shortCode){
        $this->clientId = $clientId;
        $this->secretKey = $secretKey;
        $this->shortCode = $shortCode;
    }


    /**
     * SendText allows sending of SMS message to Chikka API
     * @param type $requestId This identifier should be unique or your message will not be sent and you will be deducted
     * @param type $to  The mobile number you are sending an SMS
     * @param type $message The SMS message 
     */
    
    public function sendText($requestId, $to, $message) {
        $requestId = strip_tags($requestId);

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

        //sendText post params
        $sendData = array(
            'message_type' => $this->sendRequest,
            'mobile_number' => $to,
            'shortcode' => $this->shortCode,
            'message_id' => $requestId,
            'message' => $message
            );
        
        //send Api request to Chikka and process it 
        return $this->sendApiRequest($sendData);
    }

    /**
     * [receiveText description]
     * @todo 
     */
    public function receiveText() {
        
    }

    /**
     * [reply description]
     * @todo
     */
    public function reply() {
        
    }

    /**
     * [fetchNotifications description]
     * @todo
     */
    public function fetchNotifications() {
        
    }

    /**
     * sendApiRequest - the functionality that sends request to Chikka API endpoint
     * @param  [array] $data post params 
     * @return [object]       
     */
    private function sendApiRequest($data){
        $data = array_merge($data, array('client_id'=>$this->clientId, 'secret_key' => $this->secretKey));
        //  build a request query from arrays of data 
        $post = http_build_query($data);

        // If available, use CURL
        if (function_exists('curl_version')) {

            $to_chikka = curl_init( $this->chikkaSendUrl );
            curl_setopt( $to_chikka, CURLOPT_POST, true );
            curl_setopt( $to_chikka, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $to_chikka, CURLOPT_POSTFIELDS, $post );

            if (!$this->sslVerify) {
                curl_setopt( $to_chikka, CURLOPT_SSL_VERIFYPEER, false);
            }

            $from_chikka = curl_exec( $to_chikka );
            curl_close ( $to_chikka );

        } elseif (ini_get('allow_url_fopen')) {
            // No CURL available so try the awesome file_get_contents
            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $post
                )
            );
            $context = stream_context_create($opts);
            $from_chikka = file_get_contents($this->chikkaSendUrl, false, $context);

        } else {
            // No way of sending a HTTP post :(
            return false;
        }

        return $this->parseApiResponse($from_chikka, $data['message_type']);
    }

    /**
     * parseApiResponse - process and handle Chikka api responses
     * @param  [array] $response    Response from Chikka API
     * @param  [string] $requestType This is the message type of the sms 
     * @return [type]              
     */
    private function parseApiResponse($response, $requestType){
        //combine the current response from Chikka and the message type that was requested
        $response = json_decode($response,true);
        $response['request_type'] = $requestType;
        $response = json_decode(json_encode($response));
        
        return $response;
    }

}

?>
