<?php
  include "DBConfig.php";
  $db = new Database;
  $db->connect();
  switch($_POST['opcode']){
    case "addNV":
        echo " method_POST opcode addNV";
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $salary = $_POST['salary'];
        $date = $_POST['date'];
        $db->insertData($firstName, $lastName, $email, $salary, $date);
        file_put_contents('postaddparamdata.txt', var_export(json_encode($_POST), true));

        file_put_contents('session.txt', var_export(json_encode($_SESSION), true));
        unset($_SESSION["email"]);
        unset($_SESSION["pass"]);
        file_put_contents('sessionafter_unset.txt', var_export(json_encode($_SESSION), true));
        break;


  }
?>