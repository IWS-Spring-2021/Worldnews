<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/Tag.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$tag = new tag($db);

// Get ID
$tag->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get post
$tag->read_single();

// print_r($content_array);

// Create array
$post_arr = array(
  'id' => $tag->id,
  'tag_name' => html_entity_decode($tag->tag)

);

// Make JSON
print_r(json_encode($post_arr));

   
