<?php 
  include "DBConfig.php";
  $dbx = new Database;
  $dbx->connect();
  switch ($_GET['opcode']){
    case "getListNV":
        $dbx->getListIDNV();
        break;
  }


?>