<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/Category.php';

//   $page= 1;
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$cat = new Category($db);

$cat->id = isset($_GET['id']) ? $_GET['id'] : die();

// echo $id;


// Blog post query
$cat->read_category_by_news();
// Get row count


// Post array
$post_arr = array(
    'id' => $cat->id,
    'category' => $cat->category
);

// Make JSON
print_r(json_encode($post_arr));
