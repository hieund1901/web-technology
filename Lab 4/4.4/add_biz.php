<html><head><title>Business registration</title></head></html>
<body>
    <style>
        *{
            background-color: azure;
            font-size: 17pt;
        }
        .submit, .reset{
            cursor: pointer;
            border-radius: 5px;
        }
        .submit:hover,.reset:hover{
            background-color: yellow;
        }

    </style>
    <?php
    $title = " Click on one, or control-click on multiple cetegones";

    $name = null;
    $addr =null;
    $city =null;
    $telephone = null;
    $url = null; 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $addr = $_POST['address'];
        $city = $_POST['city'];
        $telephone =$_POST['telephone'];
        $url = $_POST['url'];
        $title = "Selecter category values are hightlighted";
    }

    ?>  
  
    <H1 style="color: blue;
                   font-size: 40pt;">Business registration</H1>
    <div style="width: 100%; display :flex ;border:ride">
        <div style="width: 40%; border:ride">
        <p>     &emsp;   <?php echo $title?></p>
        <p>    &emsp;     Seafood Stores and Restaurants </p>
        <p>   &emsp;      Health And Beauty </p>
        <p>      &emsp;   Schools and Colleges</p>

    </div>
        <table width = "60%" style="border:ride" >
        <tr></tr>
            <th></th> <th></th>
        </tr>
    
    <form method="POST">
        <tr>
        <td width = "30%"><label for="name" ></label>Name :</td>
        <td> <input type="text" id="name" name="name"  style="width: 100%; " value="<?PHP echo $name?>"></td>
        </tr>

        <tr>
        <td><label for="address"></label>Address :</td>
        <td> <input type="text" id="address" name="address" style="width: 100%;" value="<?PHP echo $addr?>"></td><br>
        </tr>
        
        <tr>
        <td><label for="city"></label>City :</td>
        <td> <input type="text" id="city" name="city" style="width: 100%;" value="<?PHP echo $city?>"></td><br>
        </tr>

        <tr>
        <td><label for="telephone"></label>Telephone :</td>
         <td> <input type="text" id="telephone" name="telephone" style="width: 100%;"value="<?PHP echo $telephone?>"></td><br>
        </tr>

        <tr>
        <td><label for="url"></label>URL :</td>
         <td> <input type="text" id="url" name="url" style="width: 100%;" value="<?PHP echo $url?>"></td><br>
        </tr>

        <tr>
        <td>
        <INPUT TYPE="submit" VALUE="Add Business" class="submit"  id="submit"  style=" width: 100%; ">
        </td>
        </tr>    

        <tr>
        <td>
        <INPUT TYPE="reset" VALUE="Add Another Business" class="RESET"  id="reset"  style=" width: 100%; display:none ">
        </td>
        </tr>   

        <br><br>

    </form>

    </table>    

  </div>

        <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $addr = $_POST['address'];
        $city = $_POST['city'];
        $telephone =$_POST['telephone'];
        $url = $_POST['url'];

    
        if(empty($name) || empty($addr) || empty($city) || empty($telephone) || empty($url)){
            echo "Please check input";
        } else{
            $server = 'localhost';  
            $user = 'root'; 
            $pass = '';
            $mydb = 'mydatabase';
            $table_name = 'businesses';
            $connect = mysqli_connect($server, $user, $pass);
            if(!$connect){
                die ("Cannot connect to $server using $user");
            } else {
                $SQLcmd = "INSERT INTO $table_name ( `Name`, `Address`, `City`, `Telephone` , `URL`) 
                VALUES ('$name','$addr','$city','$telephone', '$url')";
                                
            mysqli_select_db($connect, $mydb);
            if (mysqli_query($connect, $SQLcmd)){
                
            } else{
                die ("Table Create Creation Failed SQLcmd=$SQLcmd");
            }                    
                mysqli_close($connect);
                echo '<script> document.getElementById("submit").style.display = "none"; </script>'; 
                echo '<script> document.getElementById("reset").style.display = "block"; </script>'; 

                

        }
    }
    }
    ?> 
    
            
</body>
<Script>

    document.getElementById("reset").addEventListener("click",  function() {
        location.replace("add_biz.php");
});


</Script>
