<?php
namespace Basemodel;

class ApiRequest {

    private $host = "";

    public function __construct($host = "")
    {
        $this->host = $host;
    }

    public function post($url, $payload)
    {
        $ch = curl_init($this->host . $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($ch);
        curl_close($ch);

        header('Content-Type: application/json; charset=utf-8');
        return $return;
    }

    public function get($url, $param = [])
    {
        $ch = curl_init($this->host . $url . "?" . http_build_query($param));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($ch);
        curl_close($ch);

        header('Content-Type: application/json; charset=utf-8');
        return $return;
    }
}