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
            $sql='SELECT * FROM `marques` WHERE ID=1';
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            endif;
            return null;
        }
        public function SelectMarqueByID1($id){
            $sql='SELECT * FROM `marques` WHERE ID='.$id;
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetch(PDO::FETCH_OBJ);
                return $row;
            endif;
            return null;
        }
        public function SelectCategorieByID1($id){
            $sql='SELECT * FROM categories WHERE ID='.$id;
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetch(PDO::FETCH_OBJ);
                return $row;
            endif;
            return null;
        }
        public function SelectAllCars(){
            $rows=array();
            $sql='SELECT * FROM cars';
            $stmt=$this->con->prepare($sql);

            $stmt->execute();
            
            if($n=$stmt->rowCount()):
                for($i=0;$i<$n;$i++):
                    $row=$stmt->fetch(PDO::FETCH_OBJ);
                    $sqql=$this->SelectCategorieByID1($row->IdCategorie);
                    if($sss=$this->SelectMarqueByID1($row->IdMarque)):
                        $r=[
                            "ID"=>$row->ID,
                            "Name"=>$row->Name,
                            "Description"=>$row->Description,
                            "PlaceNumber"=>$row->PlaceNumber,
                            "Color"=>$row->Color,
                            "Photo"=>$row->Photo,
                            "PricePerDay"=>$row->PricePerDay,
                            "NumbreDoors"=>$row->NumbreDoors,
                            "Categorie"=>$sqql->Description,
                            "Marque"=>$sss->Photo,
                        ];
                        array_push($rows,$r);
                    endif;
                     
                endfor;
                return $rows;
            endif;
            return null;
        }
        public function SelectCarByID($id){
            $rows=array();
            $sql='SELECT * FROM cars WHERE ID='.$id;
            $stmt=$this->con->prepare($sql);

            $stmt->execute();
            
            if($n=$stmt->rowCount()):
                for($i=0;$i<$n;$i++):
                    $row=$stmt->fetch(PDO::FETCH_OBJ);
                    $sqql=$this->SelectCategorieByID1($row->IdCategorie);
                    if($sss=$this->SelectMarqueByID1($row->IdMarque)):
                        $r=[
                            "ID"=>$row->ID,
                            "Name"=>$row->Name,
                            "Description"=>$row->Description,
                            "PlaceNumber"=>$row->PlaceNumber,
                            "Color"=>$row->Color,
                            "Photo"=>$row->Photo,
                            "PricePerDay"=>$row->PricePerDay,
                            "NumbreDoors"=>$row->NumbreDoors,
                            "Categorie"=>$sqql->Description,
                            "Marque"=>$sss->Photo,
                        ];
                        array_push($rows,$r);
                    endif;
                     
                endfor;
                return $rows;
            endif;
            return null;
        }
        public function SelectCarsByCategorie($id){
            $sql='SELECT * FROM cars WHERE IdCategorie='.$id;
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            endif;
            return null;
        }
        public function SelectCarsByMarque($id){
            $sql='SELECT * FROM cars WHERE IdMarque='.$id;
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            endif;
            return null;
        }
        public function AddCar($name,$desc,$placenum,$color,$price,$numdor,$photo){
            $sql='INSERT INTO cars(Name,Description,PlaceNumber,Color,Photo,PricePerDay,NumbreDoors) VALUES("'.$name.'","'.$desc.'",'.$placenum.',"'.$color.'","'.$photo.'"'.$price.','.$numdor.')';
            $stmt=$this->con->prepare($sql);
            if($stmt->execute()):
                return true;
            endif;
            echo ''.$stmt->error;
            return false;
        }
        public function AddMarque($libelle,$photo){
            $sql='INSERT INTO marques(Libellé,Photo) VALUES("'.$libelle.'","'.$photo.'")';
            $stmt=$this->con->prepare($sql);
            if($stmt->execute()):
                return true;
            endif;
            echo ''.$stmt->error;
            return false;
        }
        public function AddCategorie($Description,$Photo){
            $sql='INSERT INTO categories(Description,Photo) VALUES("'.$Description.'","'.$Photo.'")';
            $stmt=$this->con->prepare($sql);
            if($stmt->execute()):
                return true;
            endif;
            echo ''.$stmt->error;
            return false;
        }
        public function AddReservation(){

        }
        public function UpdateReservation(){

        }
        public function SelectReservationById($id){

        }
        public function SelectReservationByIdClient($id){

        }
    }
?>