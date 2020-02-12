<?php
class pdoConnection{
    private $host;  
    private $user;  
    private $pass;
    private $pdo;  
    private $error;
    public function __construct($host = "mysql:host=localhost;dbname=pickbook", $user = "root", $pass=""){   
        try{
            $this->pdo = new PDO($host, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }
    public function getPDO(){
        return $this->pdo;
    }
    public function execQuery($sql){
        $result =$this->pdo->query($sql);
        return $result;
    }
    public function crudeQuery($sql){
        if(!$this->pdo->exec($sql))
        {
            $error = $this->pdo->errorInfo();
            #echo $error;
        }
    }
}
?>