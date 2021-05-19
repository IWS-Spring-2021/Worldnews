<?php 
include_once '../config/Database.php';
include_once '../models/Category.php';

$database = new Database();
$db = $database->connect();

$cat = new Category($db);
$data = json_decode(file_get_contents("php://input"));

// $cat -> get_last_cat_id();
// $id = $cat->max_id + 1;
// $post_arr = array(
//     'id' => $cat->id 
//   );
//   echo json_encode($post_arr['id']);
// echo $cat->max_id;
//   print_r(json_encode($post_arr));



// make sure data is not empty
if(
    !empty($data->cat_name)){
  
    // set cat property values
    $cat->category = $data->cat_name;
    
    // foreach ($cat->cat_id as $value){
    //     echo $value;
    // }
// echo $cat->cat_id;

    // $cat->posted_at = $data->posted_at;

  
    // create the cat
    if($cat->insert_a_cat()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "cat was created."));
    }
  
    // if unable to create the cat, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create cat."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create cat. Data is incomplete."));
}
?>