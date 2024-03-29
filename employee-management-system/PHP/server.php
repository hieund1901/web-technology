<?php
    session_start();// moi bien $_SESSION[] luu key dinh danh , de ko bi trung )
    header("Access-Control-Allow-Origin:*");
    // header("Content-type:application/json");
    // header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization');
    
    include "DBConfig.php";

    $db = new Database ;
    $db->connect();
    if($_SERVER['REQUEST_METHOD'] == 'GET'){// get cx check da login hay chua 
        $role_get = $_GET['role'];
        $opcode_get = $_GET['opcode'];
        
        switch ($role_get){
            case "admin":                
                switch($opcode_get){
                    case "getListNV":
                        $db->getListNV();   
                        break;
                    case "adminGetListShift":
                        $date = $_GET['date'];
                        $shift = $_GET['shift'];
                        echo "date and shift";
                        echo $date,$shift;
                        $db->adminGetListShift($date, $shift);
                        break;                  
                }
                break;
            case "employee":
               
                switch($opcode_get){
                    case "nvGetListShift":
                        $id = $_GET['id'];
                        $date = $_GET['date']; 
                        echo " nvListShift: " ;      
                        $db->nvGetListShift($date, $id);
                        echo " nvGetListShft OK ";
                        break; 
                    case "getListNotification":
                        $idNV = $_GET['id'];
                        file_put_contents('checkIdIngetListNoti.txt', var_export(json_encode($idNV), true));
                        $db->getListNotification($idNV);
                        break;   
                    case "getNVbyID":
                        $id = $_GET['id'];
                        $db->getNVbyID($id);
                        break;                  
                }
            break;

        }
        //$db->getListIDNV();
        //require_once("get.php");               
    };
    // dung _SERVER['method'] cho dang nhap , cac tinh nang sau dn check $_SESSION[""] ton tai hay chua ???
    if( $_SERVER['REQUEST_METHOD'] == 'POST'){//switch case chia cac role , chia file , import khoa hoc hon    

        if (isset($_POST['login'])){
            $emailS = $_POST['email'];//username
            //$pass = $_POST['pass'];
            //$role = $_POST['role'];
            //check user password
            $rsCheckLogin = $db->checkLogin($emailS);
            // dang check email co trg DB hay ko ?? 
            $email = $rsCheckLogin['email'];
            $id = $rsCheckLogin["id"];
            $pass = $rsCheckLogin["salary"];
            $role = $rsCheckLogin["role"];
            if (is_array($rsCheckLogin)){
                $_SESSION["$email"]=$email;
                $_SESSION["$id"] = $id;           
                //$_SESSION["$pass"]=$rsCheckLogin['salary'];// tam thoi salary thay pass  
                file_put_contents('success_login.txt', var_export(json_encode($_SESSION), true));
                // $response_login = ["true","role","$id"] ; 
                // $res = json_encode($response_login);  
                // return $res ;
                if ($role == 0){
                    echo "trueemployee";
                }else{
                    echo "trueadmin";
                }                
            }
            else {
                echo "Server Fail login";
            }
        }

        if (isset($_POST['logout'])){ // nhan email , id , role tu request            
            $email_logout = $_POST['email'];
            $id_logout = $_POST['id'];
            $role = $_POST['role'];
            unset($_SESSION["$email_logout"]);
            unset($_SESSION["$id_logout"]);

        }
        // quan li
        if (isset($_POST['role'])){//check Session da co thong tin user hay chua- da dang nhap hay chua, luu key dinh danh trong mang $_SESSION
            $role_post = $_POST['role'];
            $opcode_post = $_POST['opcode'];
            switch ($role_post){
                case "admin":                
                    switch ($opcode_post){
                        case "addNV":

                            $firstName = $_POST['firstName'];
                            $lastName = $_POST['lastName'];
                            $email = $_POST['email'];
                            $salary = $_POST['salary'];
                            $date = $_POST['date'];
                            $rs = $db->insertData($firstName, $lastName, $email, $salary, $date);
                            echo $rs;
                            break ;
                        case "updateNVbyID":
                            $id = $_POST['id'];
                            $firstName = $_POST['firstName'];
                            $lastName = $_POST['lastName'];
                            $email = $_POST['email'];
                            $salary = $_POST['salary'];
                            $date = $_POST['date'];
                            $db->updateNVbyID($id, $firstName, $lastName, $email, $salary, $date);

                            break;
                        case "deleteNVbyID":
                            $id = $_POST['id'];
                            $db->deleteNVbyID($id);
                            break; 
                            
                        case "addShift":
                            break;
                        case "createNotification":
                            $id = $_POST['id'];
                            $date = $_POST['date'];
                            $content = $_POST['content'];
                            $title = $_POST['title'];
                            $db->createNotification($id, $date, $title, $content);
                            break;
                        default:
                    }
                    break;
                case "employee":
                    
                    switch ($opcode_post){
                        case "readNotification":
                            $id = $_POST['id'];
                            $db->readNotification($id);
                            echo "id la mmmm",$id;
                            break;
                        default:

                    }
                    break;
                default:
            }
        }else {
            //echo "Not infor in Session";
        }
        

    //Sau khi login ms nhan cac request , check moi request bang email

 
    //$param_login = $_POST['param1'];//test log in , log out
    //$param_logout = $_POST['param2/logout'];//gui kèm thông tin user để sau đó check trong session ton tai chưa / log in chưa . 


        file_put_contents('session.txt', var_export(json_encode($_SESSION), true));
        //unset($_SESSION["$param_login"]);
        unset($_SESSION["email"]);
        unset($_SESSION["pass"]);
        file_put_contents('sessionafter_unset.txt', var_export(json_encode($_SESSION), true));
    }   

            
        session_destroy();

        // if(count($_SESSION) === 0){//neu $_Session rỗng 
        //     // echo " Destroy Session";
     
        //      session_destroy();
        //  }
    
?>