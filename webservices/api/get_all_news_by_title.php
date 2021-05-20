<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/News.php';

$title= $_GET['title'];


$page= $_GET['page'];

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog news object
$news = new News($db);

// news query
$resultA = $news->read_all_news_by_title($title);

$num = $resultA->rowCount();

$limit = 5;
$total_page = ceil($num / $limit);

if (isset($_GET["page"])) $page = $_GET["page"];
if ($page < 1) $page = 1;
if ($page > $total_page) {$page = $total_page;}

$start = ($page - 1) * $limit;


// Blog post query
$result = $news->read_all_news_title_page($title, $start, $limit);
// Get row count
$num = $result->rowCount();


// Check if any posts
if ($num > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'id' => $id,
            'title' => $title,
            'content' => html_entity_decode($content),
            'created_date' => html_entity_decode($created_date),
            'pic' => html_entity_decode($pic),
            'author' => html_entity_decode($author),
            'short_intro' => html_entity_decode($short_intro),
        );

        // Push to "data"
        array_push($posts_arr, $post_item);
        // array_push($posts_arr['data'], $post_item);
    }
    // Turn to JSON & output
    echo json_encode($posts_arr);
} else {
    // No Posts
    echo json_encode(
        array('message' => 'No News Found')

    );
}
