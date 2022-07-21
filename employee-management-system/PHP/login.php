<?php
     class CheckLogin{
        public function checkAccountandRole($params) {
            if ($params = "param addNV"){
                //echo "Param login OK";
                $_SESSION["$params"] = "username/id";
                return $params ;//phai de echo thi res ben ajax ms nhan dc
            }       
            else return "checkAccandRole fail" ;
            
        }

        public function checkSessionLogin(){// sau ko de $_POST['login'] ma truyen tham so tu server.php 
            if (isset($_POST['login'])){
                $emailS = $_POST['email'];
                $pass = $_POST['pass'];
                $role = $_POST['role'];
                //check user infor trong DB , neu dung luu infor vao session , echo tra ve cho ajax


            }
        }

        public function checkLogout(){
            //kiem tra $_POST['email'],$_POST['pass'] ton tai trong session
            //unset $_Session[] tuong ung 
        }

     }
?>