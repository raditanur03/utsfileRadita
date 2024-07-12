<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../../config/database.php';
    include_once '../../models/Users.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Users($db);
    $data = json_decode(file_get_contents("php://input"));
    $item->id = $data->id;

        $item->user_id = $data->user_id;
        $item->skill_name = $data->skill_name;
        $item->rating = $data->rating;
        $item->description = $data->description;

    if($item->updateUser()){
        echo json_encode(["message" => "Skill data updated."]);
    } else{
        echo json_encode('Skill could not be created.');
    }
?>