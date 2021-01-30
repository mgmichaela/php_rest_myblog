<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Contect-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/post.php';

// Instantiate Database and connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);

// Get ID from URL
if (isset($_GET['id'])) {
    $post->id = $_GET['id'];
} else {
    $post->id = die();
}

// The Ternary Operator: 
// $post->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get post
$post->read_single();

// Create array
$post_arr = array(
  'id' => $post->id,
  'title' => $post->title,
  'author' => $post->author,
  'body' => $post->body,
  'category_id' => $post->category_id,
  'cagetory_name' => $post->cagetory_name
);