<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json;charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once("./../../DataBase/DataBase.php");
    $db=new DataBase();
    $con=$db->Connection();
    $data=json_decode(file_get_contents("php://input"));
    if($_SERVER["REQUEST_METHOD"] != "POST"):
        $db->Message(0,404,"Page Not Found !");
    elseif(
        !isset($data->name) ||
        empty($data->name) ||

        empty($data->description) ||
        !isset($data->description) ||

        !isset($data->placeNumber) ||
        empty($data->placeNumber) ||

        !isset($data->color) ||
        empty($data->color) ||

        !isset($data->photo) ||
        empty($data->photo) ||

        !isset($data->priceperday) ||
        empty($data->priceperday) ||

        !isset($data->numdor) ||
        empty($data->numdor)  ||

        !isset($data->color) ||
        empty($data->color) 
    ):
        $db->Message(0,422,"Pleas Fill all The Required Fields !");
    else:
        $priceperday=$data->priceperday;
        $numdor=$data->numdor;
        $placeNumber=$data->placeNumber;
        $name=$data->name;
        $description=$data->description;
        $color=$data->color;
        $photo=$data->photo;
        try{
            if($db->AddCar($name,$description,$placeNumber,$color,$photo,$priceperday,$numdor)):
                $db->Message(0,202,"Successfull Addition .");
            endif;
        }catch(PDOEception $e){
            echo $e->getMessage(); 
            $db->Message(0,401,"".$e->getMessage());
        }
    endif;
?>