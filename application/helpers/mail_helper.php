<?php

class MailSender{
    static public $API_KEY = "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";
    private array $to = [];
    private ?array $sender;
    public string $subject;
    private string $content = "";


    public function __construct(array $sender=null)
    {
        $this->sender = $sender;
    }

    public function setSubject(string $subject)
    {
        $this->subject = $subject;
    }

    public function body($content){
        $this->content .= $content;
    }

    public function sendTo($to){
        $this->to[] = $to;
    }

    public function send($sender=null){
        if ($this->sender != null)
            $sender=$this->sender;

        $mailData = $this->_build();

        $ci = curl_init();
        curl_setopt($ci, CURLOPT_URL,"https://api.sendinblue.com/v3/smtp/email");
        curl_setopt($ci, CURLOPT_POST, true);

        curl_setopt($ci, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', "api-key: ".self::$API_KEY));

        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ci, CURLOPT_POSTFIELDS, json_encode($mailData));

        $resp = curl_exec($ci);
        curl_close($ci);
        return $resp;
    }

    private function _build(){
        return [
            "sender" => $this->sender,
            "to" => $this->to,
            "subject" => $this->subject,
            "htmlContent" => "<html>".$this->content."</html>"
        ];
    }
}

/*
 $mailSender = new MailSender([
    "name" => "Rafael Velosa",
    "email" => "compras@onmarketstote.pt"
]);

$mailSender->setSubject("Test");

$mailSender->body("<h4>Email de Teste</h4>");
$mailSender->body("<p>Email de teste 1</p>");

$mailSender->sendTo([
    "name" => "Rafael",
    "email" => "rafaelvelosa18@gmail.com"
]);

$mailSender->send();
 */