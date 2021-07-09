<?php
    header('Access-control-Allow-Origin: *');
    header('Content-type: application/json');

    include_once '../../config/database.php';
    include_once '../../models/apihandler.php';

    $database = new Database();
    $db = $database->dbconnect();

    if(isset($_GET['id'])){//reads a single user taking the query string 
        $post = new post($db);
        $result = $post->readspecific($_GET['id']);
    }else{//reads all the user
        $post = new post($db);
        $result = $post->read();
    }
    
    $num = $result->rowCount();

    if($num > 0){
        $posts_arr = array();
        $posts_arr['data'] = array();
        while($row = $result -> fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $post_items = array(
                'id'=>$id,
                'name'=>$name,
                'email'=>$email,
                'mobile'=>$mobile,
                'password'=>$password
            );

            array_push($posts_arr['data'],$post_items);
        }

        //convert to json
        echo json_encode($posts_arr);  
    }else {
        echo json_encode(
            array('message'=>'no user found')
        );
    }

?>