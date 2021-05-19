<?php 
include_once '../config/Database.php';
include_once '../models/News.php';

$database = new Database();
$db = $database->connect();

$news = new News($db);
$data = json_decode(file_get_contents("php://input"));

$id = $_GET['id'];

// make sure data is not empty
if(
    !empty($id)&&
    !empty($data->title) &&
    !empty($data->short_intro)&&
    !empty($data->content)&&
    !empty($data->author)
){
  
    // set news property values
    $news->id = $id;
    $news->title = $data->title;
    $news->short_intro = $data->short_intro;
    $news->content = $data->content;
    $news->author = $data->author;
    $news->created_date = $data->created_date;
    $news->pic = $data->pic;
    $news->cat_id = $data->cat_id;
    $news->tag_id = $data->tag_id;


    // $news->posted_at = $data->posted_at;
    // $result = $news->select_tagnews_by_news();
    // $num = $result->rowCount();
    // if($num > 0) {
    //     // Post array
    //     $posts_arr = array();
    //     // $posts_arr['data'] = array();
    
    //     while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    //       extract($row);
          
    //       $post_item = array(
    //         'id' => $id,
    //         'tag_name' => $content
    //       );
    
    //       // Push to "data"
    //       array_push($posts_arr, $post_item);
    //       // array_push($posts_arr['data'], $post_item);
    //     }
    //     if(in_array())

        $news->delete_tagnews();

    // create the news
    if($news->update_a_news()){
  
        // $news->delete_tagnews();
        $news->insert_a_tag_news();
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "news was updated."));
    }
  
    // if unable to update the news, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update news."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update news. Data is incomplete."));
}
?>