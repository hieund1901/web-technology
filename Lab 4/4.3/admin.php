<html><head><title>Category	Administration page</title></head></html>
<body>
    <style>
        *{
            background-color: azure;
            
        }
        .submit, .resert{
            cursor: pointer;
            border-radius: 5px;
        }
        .submit:hover,.resert:hover{
            background-color: yellow;
        }
    </style>
    <H1 style="color: blue;
                   font-size: 40pt;">Category Administration</H1>

    <table width = "80%" >
        <tr></tr>
            <th>Cat ID</th> <th>Title</th> <th>Description</th> 
        </tr>
    <?php
    // variable
    $server = 'localhost'; $user = 'root';  $pass = ''; $mydb = 'mydatabase'; $table_name = 'categories';
    $connect = mysqli_connect($server, $user, $pass);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $cate_ID= $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    if(!$connect){
        die ("Cannot connect to $server using $user");
    } else {
        $SQLcmd = "INSERT INTO `categories`(`Categori ID`, `Title`, `Description`) 
        VALUES ('$cate_ID','$title','$desc')";
                        
     mysqli_select_db($connect, $mydb);
     mysqli_query($connect, $SQLcmd);
     header("Refresh:0");

    }
    }


    if(!$connect){
    die ("Cannot connect to $server using $user");
    } else {
    $SQLcmd_Select = "SELECT * FROM $table_name";
                    
    mysqli_select_db($connect, $mydb);
    $result = mysqli_query($connect, $SQLcmd_Select);

    while($row = mysqli_fetch_array($result))
    {
        ?>
        <tr>
            <td><?php echo $row['Categori ID']?></td>       
            <td><?php echo $row['Title']?></td>
            <td><?php echo $row['Description']?></td>

        </tr>
        <?php
    }
    ?><form method="POST">
    <td> <input type="text" id="id" name="id"  style="width: 100%;"></td>
    <td> <input type="text" id="title" name="title" style="width: 100%;"></td>
    <td> <input type="text" id="desc" name="desc" style="width: 100%;"></td>
    <td>    <INPUT TYPE="SUBMIT" VALUE="Add Catrgori" class="submit" method = "POST" ></td>
    
    </form>
    <?php
        mysqli_close($connect);   
    }
    ?>
    </table>    
            
</body>

