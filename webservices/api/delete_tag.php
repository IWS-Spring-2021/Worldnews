<?php 
include_once '../config/Database.php';
include_once '../models/Tag.php';

$database = new Database();
$db = $database->connect();

$tag = new tag($db);
$data = json_decode(file_get_contents("php://input"));

$id = $_GET['id'];
$tag->id = $id;
echo $id;

// make sure data is not empty
    if($tag->delete_a_tag()){
  
    
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "tag was deleted."));
    }
  
    // if unable to update the tag, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to delete tag."));
}
  

?>