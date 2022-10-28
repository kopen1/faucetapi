<?php
namespace irkop;

class faucetpay
{
    protected $data;
    protected $api;
    
    public function __construct($data) {
        $this->api = $data["api"];
        $this->data = $data;
    }
    
    
    public function balance(){
      $data = array("currency"=>$this->data["wallet"]);
      return $this->curl("balance",$data);
    }
    public function address(){
      $data = array("address" =>$this->data["address"]);
      return $this->curl("checkaddress",$data);
    }
    public function payout(){
      $data = array(
        "currency"=>$this->data["wallet"],
        "count" => $this->data['count'], 
      );
      return $this->curl("payouts",$data);
    }
    public function send(){
      $data = array(
        "amount" =>$this->data["amount"],
        "currency" =>$this->data["wallet"],
        "to" => 
                  $this->data['address']??
                  $this->data['email'], 
        "ip_address" => file_get_contents("https://api.ipify.org/"),
      );
      return $this->curl("send",$data);
    }
    
   private function curl($path,$data){
        $data = array_merge($data,array(
        "api_key" => $this->api,
            ));
        $ch = curl_init("https://faucetpay.io/api/v1/$path");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($ch);
}

}