<?php 
include_once '../config/Database.php';
include_once '../models/Tag.php';

$database = new Database();
$db = $database->connect();

$tag = new Tag($db);
$data = json_decode(file_get_contents("php://input"));

$id = $_GET['id'];

// make sure data is not empty
if(
    !empty($id)
){
  
    // set tag property values
    $tag->id = $id;
    $tag->tag = $data->tag_name;
   


    // create the tag
    if($tag->update_a_tag()){
  
       
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "tag was updated."));
    }
  
    // if unable to update the tag, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update tag."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update tag. Data is incomplete."));
}
?>