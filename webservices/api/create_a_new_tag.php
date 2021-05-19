<?php 
include_once '../config/Database.php';
include_once '../models/Tag.php';

$database = new Database();
$db = $database->connect();

$tag = new tag($db);
$data = json_decode(file_get_contents("php://input"));

// $tag -> get_last_tag_id();
// $id = $tag->max_id + 1;
// $post_arr = array(
//     'id' => $tag->id 
//   );
//   echo json_encode($post_arr['id']);
// echo $tag->max_id;
//   print_r(json_encode($post_arr));



// make sure data is not empty
if(
    !empty($data->tag_name)){
  
    // set tag property values
    $tag->tag = $data->tag_name;
    
    // foreach ($tag->tag_id as $value){
    //     echo $value;
    // }
// echo $tag->tag_id;

    // $tag->posted_at = $data->posted_at;

  
    // create the tag
    if($tag->insert_a_tag()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "tag was created."));
    }
  
    // if unable to create the tag, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create tag."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create tag. Data is incomplete."));
}
?>