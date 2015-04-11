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
    
    function fire($job,$data){
        $this->setAddress($data[0]);
        $this->setSubject($data[1]);
        $this->setMessage($data[2]);
        mail($address,$subject,$message,$headers);
        $job->delete()
    }
}
?>
