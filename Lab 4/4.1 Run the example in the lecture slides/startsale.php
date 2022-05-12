<!DOCTYPE html>
<html>
    <style>
            *{
                background-color: azure;
                font-size: large;
            }

            .submit, .resert{
                cursor: pointer;
                background-color:gray;
                color: white;
            }
            .submit:hover,.resert:hover{
                background-color: black;
            }
            h1{
                color: blue;
                font-size: 40pt;
            }
            </style>
    <body>

        <H1 style="color: blue;
                        font-size: 40pt;">Select Product We Just Sold</H1>

        <?php 
    // variable
       $server = 'localhost'; $user = 'root';  $pass = ''; $mydb = 'mydatabase'; $table_name = 'Products';
       $connect = mysqli_connect($server, $user, $pass);
    if(!$connect){
        die ("Cannot connect to $server using $user");
    } else {
        $SQLcmd = "SELECT * FROM $table_name";
                        
        mysqli_select_db($connect, $mydb);
       $result = mysqli_query($connect, $SQLcmd);
    ?>
    <br>
    <form action="sale.php" method="POST">

    <?php
    while($row = mysqli_fetch_array($result))
    {
        ?>
        
        <label for="<?php echo $row['Product_desc']?>"><?php echo $row['Product_desc']?></label>
        <input type="radio" id="<?php echo $row['Product_desc']?>" name="itemdup" value="<?php echo $row['Product_desc']?>">
        <?php
    }
    ?>
        <br><br>
        <INPUT TYPE="SUBMIT" VALUE="Click To Submit" class="submit">
        <INPUT TYPE="RESET" VALUE="Resert" class="resert"><br>
    </form>
        <br>
    <?php
    }
    ?>

    <table border="1 " width = "80%">
            <tr>
                <th>Num</th> <th>Product_desc</th> <th>Cost</th> <th>weight</th><th>cout</th>
            </tr>
        <?php
        // query

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
</html>