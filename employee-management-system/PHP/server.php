
<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Content-type:application/json");
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization');
    $testecho = new Test ;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $testecho->console_log("OK");
    }
    require_once('index.php');
?>