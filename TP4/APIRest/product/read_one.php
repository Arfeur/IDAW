<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../database.php';
include_once '../objects/users.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare users object
$users = new Users($db);
  
// set ID property of record to read
$users->id = isset($_GET['id']) ? $_GET['id'] : die();
  
// read the details of users to be edited
$users->readOne();
  
if($users->name!=null){
    // create array
    $users_arr = array(
        "id" =>  $users->id,
        "name" => $users->name,
        "email" => $users->email
  
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($users_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user users does not exist
    echo json_encode(array("message" => "User does not exist."));
}
?>