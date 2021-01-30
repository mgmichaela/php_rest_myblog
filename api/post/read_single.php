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