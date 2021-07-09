<?php
    header('Access-control-Allow-Origin: *');
    header('Content-type: application/json');
    header('Access-control-Allow-Methods: DELETE');
    header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,Authorization,X-Request-With');
    
     

    include_once '../../config/database.php';
    include_once '../../models/apihandler.php';

    $database = new Database();
    $db = $database->dbconnect();

    $apihandler = new post($db);
    //getting posted data 
    $data = json_decode(file_get_contents('php://input'));//get the data from json object that is inside request body;
    $apihandler->id = $data->id ;
    
    
    if($apihandler->delete()){
        echo json_encode(array('message'=>'data deleted in database'));
    }else {
        echo json_encode(array('message'=>'data not deleted in database'));
    }

?>