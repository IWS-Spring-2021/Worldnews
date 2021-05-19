<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/Category.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$cat = new Category($db);

// Get ID
$cat->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get post
$cat->read_single();

// print_r($content_array);

// Create array
$post_arr = array(
  'id' => $cat->id,
  'cat_name' => html_entity_decode($cat->category)

);

// Make JSON
print_r(json_encode($post_arr));

   
