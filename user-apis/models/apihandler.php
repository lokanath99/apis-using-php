<?php
class post{
    //Database 
    private $conn;
    private $table = 'users';

    //properties 
    public $id ;
    public $name ;
    public $email;
    public $mobile;
    public $password;

    //DB constructor 
    public function __construct($db){
        $this->conn = $db;
    } 

    //GET 
    public function read(){
        $query = 'SELECT * from '.$this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readspecific($id){
        $query = 'SELECT * from '.$this->table.' WHERE id='.$id;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function write(){
        $query = 'INSERT INTO '.$this->table .'
            SET 
                id = :id,
                name = :name,
                email = :email,
                mobile = :mobile,
                password = :password
        ';
        
        //connect 
        $stmt = $this->conn->prepare($query);
        //data striping 
        $this->id = htmlspecialchars(strip_tags( $this->id));
        $this->name = htmlspecialchars(strip_tags( $this->name));
        $this->emali = htmlspecialchars(strip_tags( $this->email));
        $this->mobile = htmlspecialchars(strip_tags( $this->mobile));
        $this->password = htmlspecialchars(strip_tags( $this->password));

        //bind the params to $stmt 
        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':mobile',$this->mobile);
        $stmt->bindParam(':password',$this->password);
        
        //execute the query 
        if($stmt->execute()){
            // echo 'data enterd to database';
            return true;
        }else{
            printf('error %s.\n',$stmt->error);
            return false ;
        }
    }


    public function update(){
        $query = 'UPDATE '.$this->table .'
            SET 
                name = :name,
                email = :email,
                mobile = :mobile,
                password = :password
            WHERE 
                id = :id
                ';
        
        //connect 
        $stmt = $this->conn->prepare($query);
        //data striping 
        $this->id = htmlspecialchars(strip_tags( $this->id));
        $this->name = htmlspecialchars(strip_tags( $this->name));
        $this->emali = htmlspecialchars(strip_tags( $this->email));
        $this->mobile = htmlspecialchars(strip_tags( $this->mobile));
        $this->password = htmlspecialchars(strip_tags( $this->password));

        //bind the params to $stmt 
        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':mobile',$this->mobile);
        $stmt->bindParam(':password',$this->password);
        
        //execute the query 
        if($stmt->execute()){
            // echo 'data enterd to database';
            return true;
        }else{
            printf('error %s.\n',$stmt->error);
            return false ;
        }
    }

    public function delete(){
        $query = 'DELETE from '.$this->table.' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        return $stmt;
    }
}

?>