<!DOCTYPE html>
<HTML>
    <body>
        <H1 style="color: blue;
                   font-size: 40pt;">Products Data</H1>
    <?php 

    // variable
    $itemd = (string)$_POST['itemd'];
    if(empty($itemd)){
        echo "PLEASE CHECK INPUT";
    }
    $server = 'localhost';
    $user = 'root';  
    $pass = ''; 
    $mydb = 'mydatabase'; 
    $table_name = 'Products';
    $SQLcmd = "SELECT * FROM $table_name where Product_desc = '$itemd'";
    print '<font size = "4" color="black" > The QUERY is ';
    //print "<i>$table_name </i> in database <i> $mydb</i><br></font>";
    print "<br>$SQLcmd";


    ?>
            
        <table border="1 " width = "80%">
                <tr>
                    <th>Num</th> <th>Product_desc</th> <th>Cost</th> <th>weight</th><th>cout</th>
                </tr>
            <?php
        // connect vs query
        $connect = mysqli_connect($server, $user, $pass);
        if(!$connect){
            die ("Cannot connect to $server using $user");
        } else {

        mysqli_select_db($connect, $mydb);
        $result = mysqli_query($connect, $SQLcmd);

        if(empty($result)){
            echo "NOT FOUND INFORMATION";
        }

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


</HTML>