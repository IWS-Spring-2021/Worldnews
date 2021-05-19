<?php 
include_once '../config/Database.php';
include_once '../models/Category.php';

$database = new Database();
$db = $database->connect();

$cat = new Category($db);
$data = json_decode(file_get_contents("php://input"));

$id = $_GET['id'];
$cat->id = $id;
echo $id;

// make sure data is not empty
    if($cat->delete_a_cat()){
  
    
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "cat was deleted."));
    }
  
    // if unable to update the cat, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to delete cat."));
}
  

?>