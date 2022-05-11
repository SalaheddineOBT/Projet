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
        function SelecteClientByID($id){
            $sql='SELECT ID,Name,NationalID,NumPermis,NumRents,Photo FROM clients WHERE ID='.$id;
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            endif;
            return null;
        }
        public function SelectedClientByEmail($email){
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
        public function AddReservation($pricettl,$Renton,$ReturnOn,$rentdur,$reservdt,$client,$car){
            $sql='INSERT INTO reservations(PriceTotal,RentOn,ReturnOn,RentDurationDay,ReservationDate,IdCar,IdClient)
             VALUES('.$pricettl.',"'.$Renton.'","'.$ReturnOn.'",'.$rentdur.',"'.$reservdt.'",'.$client.','.$car.')';
            $stmt=$this->con->prepare($sql);
            if($stmt->execute()):
                return true;
            endif;
            echo ''.$stmt->error;
            return false;
        }
        public function UpdateReservation($reservId,$Renton,$ReturnOn,$rentdur){
            $sql='UPDATE reservations SET PriceTotal='.$pricettl.',RentOn="'.$Renton.'",ReturnOn="'.$ReturnOn.'",RentDurationDay='.$rentdur.'WHERE ID='.$reservId;
            $stmt=$this->con->prepare($sql);
            if($stmt->execute()):
                return true;
            endif;
            echo ''.$stmt->error;
            return false;
        }
        public function SelectReservationById($id){
            $rows=array();
            $sql='SELECT * FROM reservations WHERE ID='.$id;
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()):
                $row=$stmt->fetch(PDO::FETCH_OBJ);
                $sqql=$this->SelecteClientByID($row->IdClient);
                if($sss=$this->SelectCarByID($row->IdCar)):
                    $r=[
                        "ID"=>$row->ID,
                        "PriceTotal"=>$row->PriceTotal,
                        "RentOn"=>$row->RentOn,
                        "ReturnOn"=>$row->ReturnOn,
                        "RentDurationDay"=>$row->RentDurationDay,
                        "ReservationDate"=>$row->ReservationDate,
                        "Client"=>$sqql,
                        "Car"=>$sss,
                    ];
                    array_push($rows,$r);
                endif;
                return $rows;
            endif;
            return null;
        }
        public function SelectAllReservationd(){
            $rows=array();
            $sql='SELECT * FROM reservations';
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            if($n=$stmt->rowCount()):
                for($i=0;$i<$n;$i++):
                    $row=$stmt->fetch(PDO::FETCH_OBJ);
                    $sqql=$this->SelecteClientByID($row->IdClient);
                    if($sss=$this->SelectCarByID($row->IdCar)):
                        $r=[
                            "ID"=>$row->ID,
                            "PriceTotal"=>$row->PriceTotal,
                            "RentOn"=>$row->RentOn,
                            "ReturnOn"=>$row->ReturnOn,
                            "RentDurationDay"=>$row->RentDurationDay,
                            "ReservationDate"=>$row->ReservationDate,
                            "Client"=>$sqql,
                            "Car"=>$sss,
                        ];
                        array_push($rows,$r);
                    endif;
                endfor;
                return $rows;
            endif;
            return null;
        }
        public function SelectReservationByIdClient($id){
            $rows=array();
            $arry=array();
            $sql='SELECT * FROM reservations WHERE IdClient='.$id;
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
            $clnt=$this->SelecteClientByID($id);         
            if($n=$stmt->rowCount()):
                for($i=0;$i<$n;$i++):
                    $row=$stmt->fetch(PDO::FETCH_OBJ);
                    if($sss=$this->SelectCarByID($row->IdCar)):
                        $r=[
                            "ID"=>$row->ID,
                            "PriceTotal"=>$row->PriceTotal,
                            "RentOn"=>$row->RentOn,
                            "ReturnOn"=>$row->ReturnOn,
                            "RentDurationDay"=>$row->RentDurationDay,
                            "ReservationDate"=>$row->ReservationDate,
                            "Car"=>$sss
                        ];
                        array_push($rows,$r);
                    endif;  
                endfor;
                $arry=[
                    "Client"=>$clnt,
                    "Reservations"=>$rows
                ];
                return $arry;
            endif;
            return null;
        }

    }
?>