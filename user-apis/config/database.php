<?php
class Database{
    private $host = 'localhost';
    private $dbname = 'usersdata';
    private $username = 'user';
    private $password = '1234';
    private $conn ;

    public function dbconnect(){
        $this->conn = null ;

        try {
            $this->conn = new PDO('mysql:host = '.$this->host .'; dbname='.$this->dbname,$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //throw $th;
            echo 'connection error '. $e->getMessage();

        }
        return $this->conn;
    }
}

?>