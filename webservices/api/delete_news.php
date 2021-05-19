<?php 
include_once '../config/Database.php';
include_once '../models/News.php';

$database = new Database();
$db = $database->connect();

$news = new News($db);
$data = json_decode(file_get_contents("php://input"));

$id = $_GET['id'];
$news->id = $id;
echo $id;

// make sure data is not empty
    if($news->delete_a_news_id_in_tagnews()){
  
        $news->delete_a_news();
        // $news->update_tag_news();
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "news was deleted."));
    }
  
    // if unable to update the news, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to delete news."));
}
  

?>