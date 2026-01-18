<?php 
namespace BaseModel;

class ApiResponse {
    
    public function pushResult($msg = "", $data = [], $status){
    
        header('Content-type: application/json');
        http_response_code($status);
        echo json_encode([
            "msg" => $msg,
            "data" => $data,
            "status" => $status
        ]);
        exit;
    }
}

?>