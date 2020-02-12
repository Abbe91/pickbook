<?php
include 'PDO.php';
class User{
    private $users_id;  
    private $fulName;  
    private $IsAdmin;
    private $email;  
    private $phone;
    private $adress;
    private $postNu;
    private $ZIPcode;
    private $city;
    private $country;
    private $Password;
    private $is_news_letter;

    public function __construct($users_id, $fulName, $IsAdmin,$email,$phone,$adress,$postNu,$ZIPcode,$city,$country,$Password,$is_news_letter){
        $this->users_id = $users_id;    
        $this->fulName = $fulName;
        $this->IsAdmin = $IsAdmin;
        $this->email = $email;
        $this->phone = $phone;
        $this->adress = $adress;
        $this->postNu = $postNu;
        $this->ZIPcode = $ZIPcode;            
        $this->city = $city;            
        $this->country = $country;            
        $this->Password = $Password;            
        $this->is_news_letter = $is_news_letter;            
    }
   
    public function display(){
        return "users_id=".$this->users_id."<br>"."fulName=".$this->fulName."<br>"."IsAdmin=".$this->IsAdmin."<br>"."email=".$this->email."<br>"."phone=".$this->phone."<br>"."adress=".$this->adress."<br>"."postNu=".$this->postNu."<br>"."ZIPcode=".$this->ZIPcode."<br>"."city=".$this->city."<br>"."country=".$this->country."<br>"."Password=".$this->Password."<br>"."is_news_letter=".$this->is_news_letter."<br>";
    }
    

    public function register(){
        $users_id=$this->users_id;
        $fulName=$this->fulName;
        $IsAdmin=0;
        $email=$this->email;
        $phone=$this->phone;
        $adress=$this->adress;
        $postNu=$this->postNu;
        $ZIPcode=$this->ZIPcode;
        $city=$this->city;
        $country=$this->country;
        $Password=$this->Password;
        $is_news_letter=$this->is_news_letter;
        $Password=hash('ripemd160', $Password);
        $con=new pdoConnection();     
        $sql="INSERT INTO `users` (`fulName`,`IsAdmin`,`email`,`phone`,`adress`,`postNu`,`ZIPcode`,`city`,`country`,`Password`,`is_news_letter`) VALUES ('$fulName','$IsAdmin','$email','$phone','$adress','$postNu','$ZIPcode','$city','$country','$Password','$is_news_letter')";
        $result=$con->crudeQuery($sql);
    }

    
    public function login(){
        $email=$this->email;
        $Password=$this->Password;
        $Password=hash('ripemd160', $Password);
        $con=new pdoConnection();
        $sql = "SELECT * FROM users Where email='$email' And Password='$Password';";
        $result=$con->execQuery($sql);
        return $result;
    }
   
}

?>