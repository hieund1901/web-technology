<html><head><title>Insert</title></head></html>
<body>
    <table border="1 " width = "80%">
        <tr>
            <th>Num</th> <th>Product_desc</th> <th>Cost</th> <th>weight</th><th>cout</th>
        </tr>
    <?php

$server = 'localhost'; $user = 'root';  $pass = ''; $mydb = 'mydatabase'; $table_name = 'Products';
$connect = mysqli_connect($server, $user, $pass);
if(!$connect){
    die ("Cannot connect to $server using $user");
} else {
    $SQLcmd = "SELECT * FROM $table_name";
                    
 mysqli_select_db($connect, $mydb);
 $result = mysqli_query($connect, $SQLcmd);

while($row = mysqli_fetch_array($result))
{
    ?>
    <tr>
        <td><?php echo $row['ProductID']?></td>       
        <td><?php echo $row['Product_desc']?></td>
        <td><?php echo $row['Cost']?></td>
        <td><?php echo $row['weight']?></td>
        <td><?php echo $row['Numb']?></td>
    </tr>
    <?php
}
    mysqli_close($connect);   
}
?>
    </table>
</body>