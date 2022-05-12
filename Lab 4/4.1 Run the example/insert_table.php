<!DOCTYPE html>
<HTML>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $itemd =$_POST['itemd'];
    $cost = $_POST['cost'];
    $weight =$_POST['weight'];
    $num = $_POST['number'];
    if(empty($itemd) || empty($weight) || empty($cost) || empty($num)){
        echo "Please check input";
    } else{
        $server = 'localhost';  
        $user = 'root'; 
        $pass = '';
        $mydb = 'mydatabase';
        $table_name = 'Products';
        $connect = mysqli_connect($server, $user, $pass);
        if(!$connect){
            die ("Cannot connect to $server using $user");
        } else {
            $SQLcmd = "INSERT INTO products( `Product_desc`, `Cost`, `weight`, `Numb`) 
            VALUES ('$itemd','$cost','$weight','$num')";
                            
        mysqli_select_db($connect, $mydb);
        if (mysqli_query($connect, $SQLcmd)){
             print '<font size = "4" color="blue" > INSERT INTO';
             print "<i>$table_name </i>  <i> $mydb</i><br></font>";
             print "<br>SQLcmd=$SQLcmd";
             print "<br>insert into $table_name was sucscesfull";
            
        } else{
            die ("Table Create Creation Failed SQLcmd=$SQLcmd");
        }                    
            mysqli_close($connect);
    }
}
}
?>

</HTML>