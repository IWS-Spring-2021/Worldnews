<?php 
include_once '../config/Database.php';
include_once '../models/Category.php';

$database = new Database();
$db = $database->connect();

$cat = new Category($db);
$data = json_decode(file_get_contents("php://input"));

$id = $_GET['id'];

// make sure data is not empty
if(
    !empty($id)
){
  
    // set cat property values
    $cat->id = $id;
    $cat->category = $data->cat_name;
   


    // create the cat
    if($cat->update_a_cat()){
  
       
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "cat was updated."));
    }
  
    // if unable to update the cat, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update cat."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update cat. Data is incomplete."));
}
?>