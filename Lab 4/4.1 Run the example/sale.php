<!DOCTYPE html>
<HTML>

    <H1 style="color: blue;
                    font-size: 40pt;">Products Data</H1>
    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $itemdup = (string)$_POST['itemdup'];

           
        // variable
        $server = 'localhost'; $user = 'root';  $pass = ''; $mydb = 'mydatabase'; $table_name = 'Products';
        $connect = mysqli_connect($server, $user, $pass);
        $SQLcmd_update = "UPDATE $table_name SET Numb=Numb - 1 WHERE Product_desc = '$itemdup'";
        $SQLcmd = "SELECT * FROM $table_name";

        echo "The query is :".$SQLcmd_update;
        ?>

        <table border="1 " width = "80%">
            <tr>
                <th>Num</th> <th>Product_desc</th> <th>Cost</th> <th>weight</th><th>cout</th>
            </tr>
        <?php

    if(!$connect){
        die ("Cannot connect to $server using $user");
    } else {

                        
    mysqli_select_db($connect, $mydb);
    mysqli_query($connect, $SQLcmd_update);
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

    <?php
    } else {
        echo "PLEASE CLICK BEFORE SUBMIT";
    }



    ?>
</html>