<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    $allHead=getallheaders();
    include_once("./../../DataBase/DataBase.php");
    include_once("./../JWThandlers/Auth.php");
    $db=new DataBase();
    $con=$db->Connection();
    $auth=new Auth($con,$allHead);
    if($auth->isAuth()):
        echo json_encode($auth->isAuth());
    else:
        $db->Message(0,500,"Unauthorized !");
    endif;
?>