<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json;");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once("./../../DataBase/DataBase.php");
    include_once("./../JWThandlers/JWTHandeller.php");
    $db=new DataBase();
    $con=$db->Connection();
    $data=json_decode(file_get_contents("php://input"));
    if($_SERVER["REQUEST_METHOD"] != "POST"):
        $db->Message(0,404,"Page Not Found !");
    elseif(
        !isset($data->email) ||
        !isset($data->password) ||
        empty($data->email) ||
        empty($data->password)
    ):
        $db->Message(0,422,"Pleas Fill all The Required Fields !");
    else:
        $email = $data->email;
        $password = $data->password;
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)):
            $db->Message(0,422,'Invalid Email Format !');
        elseif(strlen($password)<8):
            $db->Message(0,422,'Your Password Must Be At Least 8 Characters !');
        else:
            try{
                $jwt=new JwtHandler();
                $stmt=$db->Login($email,$password);
                if($stmt):
                    $token =$jwt->_jwt_encode_data(
                        'http://localhost/mydbworking/',
                        array("user_id"=>$stmt)
                    );
                    echo json_encode(array(
                        'success'=>1,
                            'message'=>'You Have successfully logged in .',
                        'token'=>$token
                    ));
                else:
                    $db->Message(0,422,'Incorect Email Or Password !');
                endif;
            }catch(PDOException $e){
                $db->Message(0,500,$e->getMessage());
            }
        endif;
    endif;
?>