<?php
 class Database{
    private $hostname = '127.0.0.1';
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
        return $this->conn ;
    }
    public function write_to_console($data) {
        $console = $data;
        if (is_array($console))
        $console = implode(',', $console);
       
        echo "<script>console.log('Console: " . $console . "' );</script>";
     }
    public function console_log( $data ){
        echo 'console.log('. json_encode( $data ) .')';
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
        $sql = "INSERT INTO nhanvientest(firstName,lastName,email,salary,date) VALUES ('$firstName','$lastName','$email','$salary','$date')";
        $rs = $this->execute($sql);
        return $this->console_log("result of insert DB : $rs");
        //return $this->execute($sql);
    }

    public function getDataNV(){
        $sql = "SELECT *  FROM nhanvientest ";
        return $this->execute($sql);
    }

    public function getListIDNV(){
        $sql = "SELECT * FROM nhanvien WHERE namsinh = 1999 ";
        $rs = mysqli_query($this->connect(),$sql);
        // return $this->console_log($rs);
        $nv = mysqli_fetch_a($rs,MYSQLI_ASSOC);
        mysqli_free_result($rs);
        
        return $this->console_log($nv);
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

    public function getListData() {

        $sql = "SELECT * FROM nhanvientest";

        $rs = mysqli_query($this->connect(),$sql);

        // return $this->console_log($rs);

        $nv = mysqli_fetch_all($rs,MYSQLI_ASSOC);

        // $this->console_log("Type of nv");

        // $this->console_log(gettype($nv));

        // $this->console_log(gettype("Type of nv0 : "));

        // $this->console_log(gettype($nv[0]));

        // $this->console_log($nv);

        mysqli_free_result($rs);

        $json_nv = json_encode($nv);
        echo $json_nv ;
        // print_r($nv)

        return;
    }

 }

?>