<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json;charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once("./../../DataBase/DataBase.php");
    include_once("./../JWThandlers/JWTHandeller.php");
    $db=new DataBase();
    $con=$db->Connection();
    $data=json_decode(file_get_contents("php://input"));
    if($_SERVER["REQUEST_METHOD"] != "POST"):
        $db->Message(0,404,"Page Not Found !");
    elseif(
        !isset($data->desc) ||
        empty($data->desc) ||

        empty($data->photo) ||
        !isset($data->photo)
    ):
        $db->Message(0,422,"Pleas Fill all The Required Fields !");
    else:
        $desc=$data->desc;
        $photo=$data->photo;
        try{
            if($db->AddCategorie($desc,$photo)):
                $db->Message(0,202,"Successfull Addition .");
            endif;
        }catch(PDOEception $e){
            echo $e->getMessage(); 
            $db->Message(0,401,"".$e->getMessage());
        }
    endif;
?>