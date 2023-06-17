<?php
class Model{
    private $servername='localhost';
    private $username='root';
    private $password='';
    private $dbname='todo';
    private $conn;
    
    function __construct(){
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        if($this->conn->connect_error){
            echo 'connection failed';
        }else{
            return $this->conn;
        }
    }

    public function insertRecord($post){
        $name = $post['name'];
        $email = $post['email'];
        $password = $post['password'];
        $sql = "INSERT INTO todos(name,email,password) VALUES ('$name','$email','$password')";
        $result=$this->conn->query($sql);
        if($result){
            header('location:index.php?msg=ins');
        }else{
            echo "Error ".$sql."<br>".$this->conn->error;

        }

         
        }
        public function updateRecord($post){
            $name = $post['name'];
            $email = $post['email'];
            $password = $post['password'];
            $edited=$post['hid'];
            $sql = "UPDATE todos SET name='$name','$email','$password' WHERE id='$editid'";
            $result=$this->conn->query($sql);
            if($result){
                header('location:index.php?msg=ins');
            }else{
                echo "Error ".$sql."<br>".$this->conn->error;
    
            }
    
             
            }

        public function deleteRecord($delid) {
            $sql="DELETE FROM todos WHERE id='$delid'";
            $result=$this->conn->query($sql);
            if($result){
                header('location:index.php?msg-del');
            }else{

                echo "Error ".$sql."<br>".$this->conn->error;
            }
        }
          

        public function displayRecord(){
            $sql= 'SELECT * FROM todos';
            $result = $this->conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $data[]=$row;

                }
                return $data;
            }

        
    }
    public function displayRecordByID($editid){
        $sql = "SELECT * FROM todos WHERE id='editid'";
        $result=$this->conn->query($sql);
        if($result->num_rows==1){
            $row = $result->fetch_assoc();
            return $row;
        }
    }
}


?>