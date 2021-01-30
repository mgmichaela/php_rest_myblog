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