<?php
    header('Access-control-Allow-Origin: *');
    header('Content-type: application/json');
    header('Access-control-Allow-Methods: POST');
    header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,Authorization,X-Request-With');
    
     

    include_once '../../config/database.php';
    include_once '../../models/apihandler.php';

    $database = new Database();
    $db = $database->dbconnect();

    $apihandler = new post($db);
    //getting posted data 
    $data = json_decode( file_get_contents('php://input'));//get the data from json object;
    $apihandler->id = $data->id ;
    $apihandler->name = $data->name ;
    $apihandler->email = $data->email ;
    $apihandler->mobile = $data->mobile ;
    $apihandler->password = $data->password ;
    
    
    if($apihandler->write()){
        echo json_encode(array('message'=>'data enterd into database'));
    }else {
        echo json_encode(array('message'=>'data not enterd into database'));
    }

?>