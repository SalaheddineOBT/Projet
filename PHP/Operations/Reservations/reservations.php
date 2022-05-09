<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once("./../../DataBase/DataBase.php");
    $db=new DataBase();
    $con=$db->Connection();
    $data=json_decode(file_get_contents("php://input"));
    if($_SERVER["REQUEST_METHOD"] != "POST"):
        $db->Message(0,404,"Page Not Found !");
    elseif(
        !isset($data->selectedBy) ||
        empty(trim($data->selectedBy))
    ):
        $db->Message(0,422,"Pleas Fill all The Required Fields !");
    else:
        try{
            $selected=$data->selectedBy;
            if($selected == "ById" && isset($_REQUEST["id"]) && !empty($_REQUEST["id"])):



            elseif($selected == "All"):

                

            elseif($selected == "ById" && !isset($_REQUEST["id"]) || empty($_REQUEST["id"])):
                $db->Message(0,422,"The Car ID is Required !");

            elseif($selected == "ByIdClient" && !isset($_REQUEST["idClient"]) || empty($_REQUEST["idClient"])):
                $db->Message(0,422,"The Client ID is Required !");

            endif;
            
        }catch(PDOEception $e){ 
            $db->Message(0,401,"".$e->getMessage());
        }
    endif;
?>