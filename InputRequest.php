<?php

namespace Basemodel;

class InputRequest {

    protected function get($key = ""){
        if (isset($_GET[$key])){
            return $_GET[$key];
        }
        return null;
    }

    protected function post($key = ""){
        if (isset($_POST[$key])){
            return $_POST[$key];
        }
        return null;
    }
}