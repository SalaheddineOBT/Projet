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

                if($s=$db->SelectReservationById($_REQUEST["id"])):
                    echo json_encode(["success" => 1,'status'=>500, "Reservation" =>$s]);
                else:
                    $db->Message(0,401,"No Data With This Id !");
                endif;

            elseif($selected == "All"):

                if($stmt=$db->SelectAllReservationd()):
                    echo json_encode(["success" => 1,'status'=>500, "Reservations" => $stmt]);
                else:
                    $db->Message(0,401,"The Reservations Table Is Empty !");
                endif;

            elseif($selected == "ByIdClient" && isset($_REQUEST["idClient"]) && !empty($_REQUEST["idClient"])):

                if($ss=$db->SelectReservationByIdClient($_REQUEST["idClient"])):
                    echo json_encode(["success" => 1,'status'=>500, "Data" =>$ss]);
                else:
                    $db->Message(0,401,"No Reservation With This Client !");
                endif;

            elseif($selected == "ByIdClient" && !isset($_REQUEST["idClient"]) || empty($_REQUEST["idClient"])):
                $db->Message(0,422,"The Client ID is Required !");

            elseif($selected == "ById" && !isset($_REQUEST["id"]) || empty($_REQUEST["id"])):
                $db->Message(0,422,"The Reservation ID is Required !");

            endif;
        }catch(PDOEception $e){ 
            $db->Message(0,401,"".$e->getMessage());
        }
    endif;
?>