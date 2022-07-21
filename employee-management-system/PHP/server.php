<?php
    header('Access-Control-Allow-Origin:*');
    // header("Content-type:application/json");
    // header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization');
    //header("Content-type:application/json");
    //header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization');
    
    include "DBConfig.php";
    $db = new Database ;
    $db->connect();
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

        }
   

       

    };

    if( $_SERVER['REQUEST_METHOD'] == 'POST'){

        //echo 'console.log('. json_encode( "method: POST" ) .')';
    $opcode = $_POST['opcode'];
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
    }        
            

    //$db->getListIDNVV();

   





}

    // $firstName = $_POST['firstName'];
    // $lastName = $_POST['lastName'];
    // $email = $_POST['email'];
    // $salary = $_POST['salary'];
    // $date = $_POST['date'];

    // $arr_id =( ["1" , "3" , "6"]);
    // $datet = "2001-21-11";
    // $shift = "2";

    // //$db->insertShift($datet, $shift, $arr_id);
    // //$db->nvGetListShift( $datet, 1);
    // //$db->adminGetListShift($datet, 1 );
    // //$db->getNVbyID( 1 );
    // //$db->updateNVbyID( 3 , $firstName, $lastName,$email,$salary,$date);
    // //$db->insertData($firstName, $lastName, $email, $salary, $date);
    // //$db->insertShift($date, $firstName, $lastName);
    // //$db->createNotification(1,$datet,"tao thong bao", "hom nay death line");
    // //$db->getListNotification(1);
    // $db->readNotification(2);
    // file_put_contents('postdata.txt', var_export(json_encode($_POST), true));

    // }else{
    // //echo '<script>';
    // //echo 'console.log("Fail") insert ';
    // //echo '</script>'; 
    // } 
    // // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // //         echo "OKK: ";
    // //         print_r(json_encode($_POST)); 
            
            
    // // }
    
?>