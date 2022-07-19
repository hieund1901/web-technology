<?php
    header('Access-Control-Allow-Origin:*');
    // header("Content-type:application/json");
    // header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization');
    //header("Content-type:application/json");
    //header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization');
    
    include "DBConfig.php";
    $db = new Database ;
    $db->connect();

    //$db->nvGetListShift('2001-11-20', 1);
  
    
    
    //$db->insertShift('2001-20-15', 2 , 2);

    if( $_SERVER['REQUEST_METHOD'] == 'POST'){

        //echo 'console.log('. json_encode( "method: POST" ) .')';

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $date = $_POST['date'];

    $arr_id =( ["1" , "3" , "6"]);
    $datet = "2001-21-11";
    $shift = "2";

    //$db->insertShift($datet, $shift, $arr_id);
    //$db->nvGetListShift( $datet, 1);
    //$db->adminGetListShift($datet, 1 );
    //$db->getNVbyID( 1 );
    $db->updateNVbyID( 3 , $firstName, $lastName,$email,$salary,$date);
    //$db->insertData($firstName, $lastName, $email, $salary, $date);
    //$db->insertShift($date, $firstName, $lastName);
    file_put_contents('postdata.txt', var_export(json_encode($_POST), true));

    }else{
    //echo '<script>';
    //echo 'console.log("Fail") insert ';
    //echo '</script>'; 
    } 
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         echo "OKK: ";
    //         print_r(json_encode($_POST)); 
            
            
    // }
    
?>