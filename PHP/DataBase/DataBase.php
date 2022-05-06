<?php
    require_once(__DIR__.'/../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
    class DataBase{
        private $con;
        public function Connection(){
            $this->con =null;
            try{
                $this->con = new PDO('mysql:host='.$_ENV["DB_HOST"].';dbname='.$_ENV["DB_Name"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
                //$this->con = new PDO('mysql:host=localhost'.';dbname=id18887616_carrantal','id18887616_salaheddine','J4ekM>sYdHr/mwB0');
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->con;
            }catch(PDOException $ex){
                echo "Connection Error ! ".$ex->getMessage();
                exit;
            }
        }
        function Message($success,$status,$message){
            echo json_encode(array(
                'success'=>$success,
                'status'=>$status,
                'message'=>$message
            ));
        }
        function Login($email,$password){
            $sql='SELECT * FROM clients WHERE Email="'.$email.'"';
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetch(PDO::FETCH_ASSOC);

                $checkPass=password_verify($password,$row['Password']);

                if($checkPass):
                    return $row["ID"];
                endif;
            endif;
            return null;
        }
        function Register($username,$email,$password,$phone){
            $sql='INSERT INTO clients (Name,Email,Password,NumPhone) VALUES("'.$username.'","'.$email.'","'.password_hash($password,PASSWORD_DEFAULT).'","'.$phone.'");';
            $stmt=$this->con->prepare($sql);
            if($stmt->execute()):
                return true;
            endif;
            echo ''.$stmt->error;
            return false;
        }
        function SelecteByID($id){
            $sql='SELECT Name FROM clients WHERE ID='.$id;
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            endif;
            return null;
        }
        public function SelectedByEmail($email){
            $sql='SELECT * FROM clients WHERE Email="'.$email.'"';
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                return true;
            endif;
            return false;
        }
        public function SelectAllCategories(){
            $sql='SELECT * FROM categories';
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetchall(PDO::FETCH_ASSOC);
                return $row;
            endif;
            return null;
        }
        public function SelectCategorieByID($id){
            $sql='SELECT * FROM categories WHERE ID='.$id;
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            endif;
            return null;
        }
        public function SelectAllMarques(){
            $sql='SELECT * FROM marques';
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetchall(PDO::FETCH_ASSOC);
                return $row;
            endif;
            return null;
        }
        public function SelectMarqueByID($id){
            $sql='SELECT * FROM marques WHERE ID='.$id;
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            endif;
            return null;
        }

    }
?>