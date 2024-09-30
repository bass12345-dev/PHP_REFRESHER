<?php 


class Connection{

    public $conn;
    private $db_name;
    private $host;
    private $username;
    private $password;
    

    function db(){
        
        $this->db_name = 'test_crud';
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
       
        try {

            $hdb= "mysql:host=$this->host;dbname=$this->db_name";
            $this->conn = new PDO($hdb,$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

            return $this->conn;
            
        } catch (PDOException $err) {
            
            echo $err->getMessage();
        }
    }
    
}






?>