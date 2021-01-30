<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Contect-Type: application/json');
header('Acess-Control-Allow-Methods: POST');
header('Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Contect-Type
Acess-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/database.php';
include_once '../../models/post.php';

// Instantiate Database and connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);

// Get raw posted data 
$data = json_decode(file_get_contents("php://input"));

$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;

// Create post
if($post->create()) {
    echo json_encode(
        array('message' => 'Post Created')
    );
} else {
    echo json_encode(
        array('message' => 'Post Not Created')
    );
}
