<?php
class Email{
    var $address;
    var $subject;
    var $message;
    var $headers = 'From: EPL Kit Tracker' . "\r\n";
    
    function setAddress($add){
        $this->address = $add;
    }
    
    function setSubject($sub){
        $this->subject = $sub;
    }
    
    function setMessage($mess){
        $this->message = $mess;
    }
    
    function send(){
        mail($address,$subject,$message,$headers);
    }
}
?>
