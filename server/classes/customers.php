<?php
include 'PDO.php';
class Customer{
    private $name;  
    private $email;  
    private $phone;
    private $postNumber;  
    private $zipCode;
    private $city;
    private $country;
    private $password;
    private $address;

    public function __construct($email, $name, $phone,$postNumber,$zipCode,$city,$country,$password,$address){
        $this->name = $name;    
        $this->email = $email;
        $this->phone = $phone;
        $this->postNumber = $postNumber;
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->country = $country;
        $this->password = $password;            
        $this->address = $address;            
    }
   
    public function display(){
        return "Email=".$this->email."<br>"."Name=".$this->name."<br>"."Phone=".$this->phone."<br>"."Post Number=".$this->postNumber."<br>"."Zip Code=".$this->zipCode."<br>"."City=".$this->city."<br>"."Country=".$this->country."<br>"."Password=".$this->password."<br>"."Address=".$this->address."<br>";
    }
    

    public function register(){
        $name=$this->name;
        $isAdmin=0;
        $email=$this->email;
        $phone=$this->phone;
        $address=$this->address;
        $postNumber=$this->postNumber;
        $zipCode=$this->zipCode;
        $city=$this->city;
        $country=$this->country;
        $password=$this->password;
        $password=hash('ripemd160', $password);
        $con=new pdoConnection();     
        $sql="INSERT INTO customers VALUES ('$name','$isAdmin','$email','$phone','$address','$postNumber','$zipCode','$city','$country','$password')";
        $result=$con->crudeQuery($sql);
    }

    
    public function login(){
        $email=$this->email;
        $password=$this->password;
        $password=hash('ripemd160', $password);
        $con=new pdoConnection();
        $sql = "SELECT * FROM customers Where email='$email' And password='$password';";
        $result=$con->execQuery($sql);
        return $result;
    }
   
}

?>