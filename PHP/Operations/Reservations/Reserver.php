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
        !isset($data->priceperttl) ||
        empty($data->priceperttl) ||

        !isset($data->returnon) ||
        empty($data->returnon) ||

        !isset($data->car) ||
        empty($data->car) ||

        !isset($data->client) ||
        empty($data->client) ||

        empty($data->renton) ||
        !isset($data->renton)
    ):
        $db->Message(0,422,"Pleas Fill all The Required Fields !");
    else:
        $datetime1 = new DateTime($renton);
        $datetime2 = new DateTime($returnon);
        $interval = $datetime1->diff($datetime2);

        $priceperttl=$data->priceperttl;
        $renton=$data->renton;
        $car=$data->car;
        $client=$data->client;
        $returnon=$data->returnon;
        $num=$interval->format('%a');
        $reservdt=date("Y-m-d h:i:s");

        try{
            if($db->AddReservation($priceperttl,$renton,$returnon,$num,$reservdt,$client,$car)):
                $db->Message(0,202,"Successfull Addition .");
            endif;
        }catch(PDOEception $e){
            echo $e->getMessage(); 
            $db->Message(0,401,"".$e->getMessage());
        }
    endif;
?>