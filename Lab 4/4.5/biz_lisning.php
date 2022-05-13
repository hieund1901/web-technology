<html><head><title>Business Lisning</title></head></html>

<style>
        *{
            background-color: azure;
            font-size: 17pt;
            text-align: center;
        }
        #submit{
            cursor: pointer;
            border-radius: 5px;
        }
        #submit:hover{
            background-color: yellow;
        }

    </style>
<?PHP 
//variable
$server = 'localhost';  
$user = 'root'; 
$pass = '';
$mydb = 'mydatabase';
$table_name = 'businesses';
$connect = mysqli_connect($server, $user, $pass);
            if(!$connect){
                die ("Cannot connect to $server using $user");
            } else{
                $SQLcmd = "SELECT * FROM $table_name";
                mysqli_select_db($connect, $mydb);
                $result = mysqli_query($connect, $SQLcmd);


            }


?>


<body>
<H1 style="color: blue;
                   font-size: 40pt;">Business Lisning</H1>
<div>
    <form method="POST" style="width: 18%; float:left" >
        <table border="1">
        <tr>
            <td>Click on category to find business lisning</td>
        </tr>
        <?PHP 
        
        if(!$connect){
            die ("Cannot connect to $server using $user");
        } else{
            $SQLcmd = "SELECT * FROM $table_name";
            mysqli_select_db($connect, $mydb);
            $result = mysqli_query($connect, $SQLcmd);
            while($row = mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <td>  <input type="submit" value="<?php echo $row['Name']?>" name="name" style="width: 100%; border:transparent" id="submit"></td>       

                </tr>
                <?php
            }

        }
        ?>

        </table>
    </form>
    <table border="1" style="width: 80%; float:right">
        <tr>
            <td style="width: 10%;">Business ID</td> <td>Name</td> <td>Address</td> <td>City</td> <td>Telephone</td> <td>URL</td>
        </tr>
    <?PHP 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST['name'];
        if(!$connect){
            die ("Cannot connect to $server using $user");
        } else{
            $SQLcmd = "SELECT * FROM $table_name WHERE $table_name.Name = '$name'";
            mysqli_select_db($connect, $mydb);
            $result = mysqli_query($connect, $SQLcmd);
            while($row = mysqli_fetch_array($result))
            {
                ?>
                    <tr>
                        <td style="width: 10%;"><?php echo $row['Business ID']?></td>       
                        <td><?php echo $row['Name']?></td>
                        <td><?php echo $row['Address']?></td>
                        <td><?php echo $row['City']?></td>
                        <td><?php echo $row['Telephone']?></td>
                        <td><?php echo $row['URL']?></td>
                    </tr>
                <?php
            }

        }
        }
        ?>
    

    </table>
</div>


</body>


<?PHP ?>
