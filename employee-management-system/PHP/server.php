<?php
    header('Access-Control-Allow-Origin:*');
    // header("Content-type:application/json");
    // header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization');
    //header("Content-type:application/json");
    //header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization');
    
    include "DBConfig.php";
    $db = new Database ;
    $db->connect();
    // if($_SERVER['REQUEST_METHOD'] == 'GET'){
    //     $db->getDataNV();
    //     file_put_contents('getdata.txt', var_export(json_encode($_GET), true));
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $opcode = $_GET['opcode'];
        switch ($opcode){
            case "getListIDNV":
                $db->getListIDNV();   
                break;
            case "nvGetListShift":
                $id = $_GET['id'];
                $date = $_GET['date'];

                $db->nvGetListShift($date, $id);
                break;
            case "getListNotification":
                $idNV = $_GET['id'];
                $db->getListNotification($idNV);
                break;
            case "adminGetListShift":
                $date = $_GET['date'];
                $shift = $_GET['shift'];
                echo "date and shift";
                echo $date,$shift;
                $db->adminGetListShift($date, $shift);
                break;
            case "getNVbyID":
                $id = $_GET['id'];
                $db->getNVbyID($id);
                break;
            case "getListData":
                $db->getListData();
                break;

        }
    };


    

    // if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    //     echo 'console.log('. json_encode( "method: POST" ) .')';
    
    // if (isset($_POST['name'])){
    //     echo 'console.log("post_name") ';   
    // }


    // file_put_contents('postdata.txt', var_export(json_encode($_POST), true));

    // }

    if( $_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['login'])){

            $emailS = $_POST['email'];//username

            //$pass = $_POST['pass'];

            //$role = $_POST['role'];

            //check user password

            file_put_contents('post_login.txt', var_export(json_encode($_POST), true));    
            $rsCheckLogin = $db->checkLogin($emailS);
            file_put_contents('post_login.txt', var_export(json_encode($rsCheckLogin), true));    


            // dang check email co trg DB hay ko ??

            $email = $rsCheckLogin['email'];

            $id = $rsCheckLogin["id"];

            $pass = $rsCheckLogin["salary"];

            if (is_array($rsCheckLogin)){
                
                $_SESSION["$email"]=$rsCheckLogin['email'];
                
                $_SESSION["$id"] = $rsCheckLogin["id"];          
                
                $_SESSION["$pass"]=$rsCheckLogin['salary'];// tam thoi salary thay pass  
                file_put_contents('success_login.txt', var_export(json_encode($_SESSION), true));    


                echo "true" ;

            }

            else {

                echo "false login";

                //require_once("post.php");

            }

        }

        //echo 'console.log('. json_encode( "method: POST" ) .')';
    if ($opcode = $_POST['opcode']){
    switch ($opcode){
        case "updateNVbyID":
            $id = $_POST['id'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $salary = $_POST['salary'];
            $date = $_POST['date'];
            $db->updateNVbyID($id, $firstName, $lastName, $email, $salary, $date);
            break ; 
        case "deleteNVbyID" :
            $id = $_POST['id'];
            $db->deleteNVbyID($id);
            break;  
            
        case "createNotification":
                $id = $_POST['id'];
                $date = $_POST['date'];
                $content = $_POST['content'];
                $title = $_POST['title'];
                $db->createNotification($id, $date, $title, $content);
                break;
        case "addNV":
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $salary = $_POST['salary'];
            $date = $_POST['date'];
        
            $db->insertData($firstName, $lastName, $email, $salary, $date);
            break;
        case "readNotification":
            $id = $_POST['id'];
            $db->readNotification($id);
            break;
    } 
}
}       

?>