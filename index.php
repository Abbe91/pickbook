<?php 
session_start();
	include('../pickbook/server/handlers/showProduct.php');
	include('../pickbook/server/handlers/cartHandler.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pickbook</title>
    <link rel="stylesheet" type="text/css" id="applicationStylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="./js/logic.js"></script>
</head>

<body >
    <header>
        <div class="header">
            <a href="./index.php" class="logo"><img src="./img/logo.png" style="width:180px;" alt=""></a>
            <div class="header-center">
           
            </div>
            <div class="header-right">
                <a><input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category"></a>
                <a></a>
                <a class="active" onclick="location.href='login.html'"><img src="./img/login@2x.png" style="width: 30px; color: aliceblue;" alt=""> <?php if(isset($_SESSION["myemail"])){echo $_SESSION["myemail"];}  ?>login</a>
              <a class="active" onclick="location.href='logout.php'" ><img src="./img/login@2x.png" style="width: 30px; color: aliceblue;" alt="">logout</a>
                <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                    <!-- Modal Content -->
                    <form class="modal-content animate" action="action_page.php">
                        <div class="container">
                            <label for="uname"><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="uname" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required>

                            <button type="submit">Login</button>
                            <label>
                      <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                        </div>

                        <div class="container" style="background-color:#f1f1f1">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                            <span class="psw" href="#"> </a></span>
                        </div>
                    </form>
                </div>

                <a></a>
                <a class="active" href="#home"><img src="./img/heart_@2x.png" style="width: 30px;" alt=""></a>
                <a></a>
                <a class="active" href="./cart.php">

              
                    
                <?php  
				if(isset($_GET['add_cart'])){
				    cart();
                     echo "Added to cart :";
                     echo "<span > </span>" ;
                     total_items();
                     echo "<span> </span>" ;
                     echo "Total price :";
                     total_price();
				}
			 ?>
             <img src="./img/shopping_cart.png" style="width: 30px;" alt="">
            
            
            
            </a>
            </div>
        </div>
    </header>
    <div id="catNav" class="topnav">
    <a onclick="" class="active" href="./index.php">Home</a>

         <?php 
            getCat();
            
         ?>
    </div>
    
    <section class="product">
        <div class="container">
        <h1 class="title-h">Latest Products</h1>
            <div class="row">
               <?php 
                 getPro();
                 getCatPro(); 

                ?> 
           </div>
        </div>
    </section>
   
    <section class="Newsletter">
    <div >

    <div class="container">
      <h4>Learn about new offers and get more deals by joining our Newsletter</h4>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <div >
          <table>          
          <tr>
          <td><label for="email"><b>Email   </b></label> </td>
          <td> <input type="text" placeholder="Enter Email" name="emailForNewsLetter" required></td>
          </tr>
          <tr>
          <td><label for="psw"><b>Name   </b></label></td>
          <td><input type="text" placeholder="Enter Your Name" name="nameForNewsLetter" required></td>
          </tr>
          </table>
          <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
          </label>
    
          <div class="clearfix">
            <button type="submit" onclick="sendNewsletter()" class="signupbtn">Subscribe</button>
          </div>
      </div>
      <br>
      <div >
        
    </div>
    </section>
    <footer class="footer">
        <div style="width: 40%; margin: auto;">
            <table>
                <tr>
                <td><label for="email"><b>Email </b></label> </td>
                <td><input type="text" placeholder="Enter Your email" name="deleteOneEmail"></td>
                </tr>
            </table>
           <div>
           <button type="submit" onclick="deletNewsletter()" class="signupbtn" >Unsubscribe</button>
           </div>
        </div>
    </footer>
</body>

</html>