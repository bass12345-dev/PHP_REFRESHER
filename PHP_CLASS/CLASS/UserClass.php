<?php


class PersonClass {
    public $first_name;
    public $middle_name;
    public $last_name;
    
    public function __construct($first_name,$middle_name,$last_name) {
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
    }

    
}

class User extends PersonClass{
    private $conn;
  
    public $username;
    public $gender;
    public $user_status;
    public $user_id;
    private $table_name = 'users';
    

    public function __construct($db,$first_name,$middle_name,$last_name){
        parent::__construct($first_name,$middle_name,$last_name);

        $this->conn = $db;

    }

    public function QueryUsers(){
        
        $query = 'SELECT * FROM users';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }

    public function InsertData(){
        $items = array(
            'first_name'    => $this->first_name, 
            'middle_name'   => $this->middle_name,
            'last_name'     => $this->last_name,
            'gender'        => $this->gender,
            'username'      => $this->username, 
            'user_status'   => $this->user_status 
        );
    
        try {
            $query = 'INSERT INTO users(first_name,middle_name,last_name,gender,user_status,username) VALUES(:first_name,:middle_name,:last_name,:gender,:user_status,:username)';
            $statement = $this->conn->prepare($query);
            $statement->execute($items);
            $res = $statement->rowCount();
            return $res;
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function DeleteUser(){
        
        $query = 'DELETE FROM users WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id'=> $this->user_id]);
        return $stmt->rowCount();
    }

    public function UpdateData(){   

        $items = array(
            'first_name'    => $this->first_name, 
            'middle_name'   => $this->middle_name,
            'last_name'     => $this->last_name,
            'gender'        => $this->gender,
            'username'      => $this->username, 
            'user_status'   => $this->user_status,
            'user_id'       => $this->user_id
        );

        $query = 'UPDATE users SET 
                                first_name  =:first_name,
                                middle_name =:middle_name,
                                last_name   =:last_name,
                                user_status =:user_status,
                                username    =:username,
                                gender      =:gender 
                    WHERE       user_id     =:user_id';
    
        $statement = $this->conn->prepare($query);
        $statement->execute($items);
        return $statement->rowCount();
    

    }
}

?>