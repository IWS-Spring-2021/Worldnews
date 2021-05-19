<?php 
include_once '../config/Database.php';
include_once '../models/News.php';

$database = new Database();
$db = $database->connect();

$news = new News($db);
$data = json_decode(file_get_contents("php://input"));

$news -> get_last_news_id();
$id = $news->max_id + 1;
// $post_arr = array(
//     'id' => $news->id 
//   );
//   echo json_encode($post_arr['id']);
// echo $news->max_id;
//   print_r(json_encode($post_arr));



// make sure data is not empty
if(
    !empty($data->title) &&
    !empty($data->short_intro)&&
    !empty($data->content)&&
    !empty($data->author)
){
  
    // set news property values
    $news->title = $data->title;
    $news->short_intro = $data->short_intro;
    $news->content = $data->content;
    $news->author = $data->author;
    $news->created_date = $data->created_date;
    $news->pic = $data->pic;
    $news->cat_id = $data->cat_id;
    $news->tag_id = $data->tag_id;
    $news->id = $id;
    
    // foreach ($news->tag_id as $value){
    //     echo $value;
    // }
// echo $news->tag_id;

    // $news->posted_at = $data->posted_at;

  
    // create the news
    if($news->insert_a_news()){
  
        $news->insert_a_tag_news();
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "news was created."));
    }
  
    // if unable to create the news, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create news."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create news. Data is incomplete."));
}
?>