<?php
 class Database{
    private $hostname = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'qlnhansu';
    private $conn = NULL ;
    private $result = NULL ;
    
       

    public function connect(){
        $this->conn = new mysqli($this->hostname,$this->username,$this->pass,$this->dbname);
        if(!$this->conn){
            echo "Ket noi that bai";
            exit();
        }
        else{
            mysqli_set_charset($this->conn, 'utf8');
            
        }
        //echo " OK ";
        //$this->console_log('Ket noi DB OK: ',$this->conn);
        return $this->conn ;
    }
    public function write_to_console($data) {
        $console = $data;
        if (is_array($console))
        $console = implode(',', $console);
       
        echo "<script>console.log('Console: " . $console . "' );</script>";
     }
    public function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    public function execute($sql){
        $this->result = $this->conn->query($sql);
        return $this -> result;
        // $rs = $this->conn->query($sql);
        // $nv = mysqli_fetch_all($rs,MYSQLI_ASSOC);
        // mysqli_free_result($rs);
        // return $nv ;
    }

    public function insertData($firstName, $lastName, $email, $salary, $date){
        $sql = "INSERT INTO nhanvien(`fistName`, `lastName`, `email`, `salary`, `date`) VALUES ('$firstName','$lastName','$email','$salary','$date')";
        $rs = $this->execute($sql);
        return $this->console_log("result of insert DB : $rs");
        //return $this->execute($sql);
    }

    public function getListIDNV(){
        $sql = "SELECT * FROM nhanvien  ";
        $rs = mysqli_query($this->connect(),$sql);
        $nv = mysqli_fetch_all($rs,MYSQLI_ASSOC);
        // echo "Type of nv: ";
        // echo gettype($nv);  
        // mysqli_free_result($rs);
        // echo "List nv : ";  
        $json_nv = json_encode($nv);
        echo $json_nv ;     
        return ;

    }
    public function updateIDNV($new_value){
        $sql = "UPDATE shift_nv SET list_id_nv='$new_value' WHERE ngay = 707 ";        
        return $this->execute($sql);
    }

    public function getListIDNVV(){//truyen 1 phan tu moi ( afternoon ) qua tham so 
        $sql = "SELECT list_id_nv FROM shift_nv WHERE ngay = 707 ";
        $rs = mysqli_query($this->connect(),$sql);      
        $nv = mysqli_fetch_object($rs);
        mysqli_free_result($rs); 
        $this->console_log('typeof list_id_nv: ');
        $this->console_log(gettype($nv->list_id_nv));  
        $this->console_log($nv->list_id_nv);
        $arr_id = json_decode($nv->list_id_nv);     
        $this->console_log('typeof arr_id: ');
        $this->console_log(gettype($arr_id)); 
        $this->console_log($arr_id); 
        // $this->console_log(gettype($nv[0]['list_id_nv']));       
        // $this->console_log($nv[0]['list_id_nv']);       
        if (in_array('afternoon',$arr_id)){
            return $this->console_log('Already exist in arr');
        }

        array_push($arr_id,'afternoon');
        
        $this->console_log('after add arr_id: ');
        $this->console_log($arr_id);
        $new_arr_id = json_encode($arr_id);
        $this->console_log('typeof new_arr_id: ');
        $this->console_log(gettype($new_arr_id)); 
        $this->console_log($new_arr_id);

        return $this->updateIDNV($new_arr_id) ;
    }


    //  lay danh sach nhan vien bang id (xem nguoi lam cung ca)
    public function nvGetListShift($date, $id){       
        $sql = "SELECT * FROM phanca WHERE date =  '$date' ";
        $rs = mysqli_query($this->connect(),$sql);     
        $arrShift = array("" , ""); 
        while($list = mysqli_fetch_object($rs)){
            $arr_id = json_decode($list->list_ID_NV);        
            foreach($arr_id as $i){  
                if($i == $id){
                    $string = "" ;                                     
                    foreach($arr_id as $j){
                        $sql = "SELECT fistName, lastName FROM nhanvien WHERE id = $j ";
                        $rscolleagues = mysqli_query($this->connect(),$sql);        
                        $nv = mysqli_fetch_object($rscolleagues);  
                       // echo "string",$string;
                        $string = $string."'".$nv->fistName." ".$nv->lastName."' ";
                    }

                    if($list->shift == 1){
                        $arrShift[0].=$string;
                    } else if($list->shift == 2){
                        $arrShift[1].=$string;
                    }
                }

            }


        }
        $jsonArrShift = json_encode($arrShift);
        echo $jsonArrShift;
        return ;

    }
    public function adminGetListShift($date, $shift){       
        $sql = "SELECT * FROM phanca WHERE date =  '$date' AND shift = '$shift' ";
        $rs = mysqli_query($this->connect(),$sql);
        //$this->console_log("Result: ");
        //$this->console_log($rs);
        $listShift = "";
         
        while($list = mysqli_fetch_object($rs)){
            //echo 9999;
            $arr_id = json_decode($list->list_ID_NV);        
                                   
                    foreach($arr_id as $i){
                        $sql = "SELECT fistName, lastName FROM nhanvien WHERE id = $i ";
                        $rscolleagues = mysqli_query($this->connect(),$sql);    
                        $nv = mysqli_fetch_object($rscolleagues);  
                        $listShift = $listShift ."'".$nv->fistName." ".$nv->lastName."' ";
                    }

        }
        $this->console_log($listShift);
        return $listShift;

    }
    

    public function getNVbyID($id){
        $sql = "SELECT * FROM nhanvien WHERE id= '$id' ";
        $rs = mysqli_query($this->connect(),$sql);
        $nv = mysqli_fetch_object($rs);
 
        $jsonNV = json_encode($nv);
        echo $jsonNV;



    }
    
    public function updateNVbyID($id, $fistName, $lastName, $email, $salary, $date){
        $sql = "UPDATE `nhanvien` SET `fistName`='$fistName',`lastName`='$lastName',
        `email`='$email',`salary`='$salary',`date`='$date' WHERE `id`='$id' ";
        $this->execute($sql);
    }

    
    public function insertShift($date , $shift, $arr_id){//cho quan li sap xep lich
        $sql = "SELECT * FROM phanca  WHERE date = '$date' and shift = $shift ";
        $rs = mysqli_query($this->connect(),$sql);
       
        $data = mysqli_fetch_object($rs);


        if($data == null){
            $new_arr_id = json_encode($arr_id);
            $sql = "INSERT INTO `phanca`(`date`, `shift`, `list_ID_NV`) 
            VALUES ('$date','$shift','$new_arr_id') ";

            echo 'taoo thanh cong';
            $this->execute($sql);

        }else{
            $new_arr_id = json_encode($arr_id);
            $sql = "UPDATE `phanca` SET `list_ID_NV`='$new_arr_id'";
              $this->execute($sql);
        }
        echo $shift,$date;
       
    }


    public function createNotification($idNV, $date, $title, $content){
        $sql = "INSERT INTO `thongbao`(`id_nv`, `date`, `title`, `content`, `isRead`)
        VALUES ('$idNV','$date','$title','$content','0')";
        $this->execute($sql);

    }

    public function getListNotification($idNV){
        $sql = "SELECT * FROM thongbao  WHERE id_NV = $idNV ";
        $rs = mysqli_query($this->connect(),$sql);     
        $data = mysqli_fetch_array($rs);
        $jsonData = json_encode($data);
        echo $jsonData;      
    }

    public function readNotification($id){
        $sql = "UPDATE `thongbao` SET `isRead`='1' WHERE `id`='$id'";
        $this->execute($sql);
    }

 }

?>