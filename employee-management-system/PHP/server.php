<?php
    header('Access-Control-Allow-Origin:*');
    // header("Content-type:application/json");
    // header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization');
    //header("Content-type:application/json");
    //header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization');
    //$testecho = new Test ;
    if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    //echo ("method_of_request: $method ");
        echo '<script>';
        echo 'console.log('. json_encode( "method: POST" ) .')';
        echo '</script>';
    
    if (isset($_POST['name'])){
        echo '<script>';
        echo 'console.log("post_name") ';
        echo '</script>';       
    }
    file_put_contents('postdata.txt', var_export(json_encode($_POST), true));

    }else{
    echo '<script>';
    echo 'console.log("Fail") ';
    echo '</script>'; 
    } 
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         echo "OKK: ";
    //         print_r(json_encode($_POST)); 
            
            
    // }
    
?>