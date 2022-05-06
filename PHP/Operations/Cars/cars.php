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
                if($s=$db->SelectCarByID($_REQUEST["id"])):
                    echo json_encode(["success" => 1,'status'=>500, "Car" =>$s]);
                else:
                    $db->Message(0,401,"No Data With This Id !");
                endif;
            elseif($selected == "All"):
                if($stmt=$db->SelectAllCars()):
                    echo json_encode(["success" => 1,'status'=>500, "Cars" => $stmt]);
                else:
                    $db->Message(0,401,"The Cars Table Is Empty !");
                endif;
            elseif($selected == "ByIdCategorie" && isset($_REQUEST["idCategorie"]) && !empty($_REQUEST["idCategorie"])):
                if($ss=$db->SelectCarsByCategorie($_REQUEST["id"])):
                    echo json_encode(["success" => 1,'status'=>500, "Cars" =>$ss]);
                else:
                    $db->Message(0,401,"No car With This Categorie !");
                endif;
            elseif($selected == "ByIdMarque" && isset($_REQUEST["idMarque"]) && !empty($_REQUEST["idMarque"])):
                if($sc=$db->SelectCarsByMarque($_REQUEST["id"])):
                    echo json_encode(["success" => 1,'status'=>500, "Cars" =>$sc]);
                else:
                    $db->Message(0,401,"No Car With This Marque !");
                endif;
            elseif($selected == "ById" && !isset($_REQUEST["id"]) || empty($_REQUEST["id"])):
                $db->Message(0,422,"The Car ID is Required !");
            elseif($selected == "ByIdCategorie" && !isset($_REQUEST["idCategorie"]) || empty($_REQUEST["idCategorie"])):
                $db->Message(0,422,"The Categorie ID  is Required !");
            elseif($selected == "ByIdMarque" && !isset($_REQUEST["idMarque"]) || empty($_REQUEST["idMarque"])):
                $db->Message(0,422,"The Marque ID is Required !");
            endif; 
        }catch(PDOEception $e){ 
            $db->Message(0,401,"".$e->getMessage());
        }
    endif;
?>