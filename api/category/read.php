<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/Category.php';

// Instantiate Database and connect
$database = new Database();
$db = $database->connect();

// Instantiate category object
$category = new Category($db);

// Category read query
$result = $category->read();
// Get row count
$num = $result->rowCount();

// Check for categories
if ($num > 0) {
  // Category array
  $category_arr = array();
  $category_arr['data'] = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $category_item = array(
      'id' => $id,
      'name' => $name,
    );

    //Push to 'data'
    array_push($category_arr['data'], $category_item);
  }

  // Turn to JSON and output
  echo json_encode($category_arr);
} else {
  // No categories
  echo json_encode(
    array('message' => 'No Categories Found')
  );
}
