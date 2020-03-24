<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" id="applicationStylesheet" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/checkout.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="header">
            <a href="./index.php" class="logo"><img src="./img/logo.png" style="width:170px;" alt=""></a>
            <div class="header-center">
        </div>
            <div class="header-right">
              <a><input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category"></a>
              <a></a>
              <a class="active" onclick="document.getElementById('id01').style.display='block'"><img src="./img/login@2x.png" style="width: 30px; color: aliceblue;" alt=""> Login</a>
              <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'"
              class="close" title="Close Modal">&times;</span>
              
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
              <a class="active" href="#home"><img src="./img/shopping_cart.png" style="width: 30px;" alt=""></a>
            </div>
          </div>
    </header>
    <div class="topnav">
        <a class="active" href="./index.php">Home</a>
    </div>
    <br>

<div id="container">
<div id="shipping_details">
<h1>Shopping Cart</h1>

</div>
<form id="address">
<fieldset>
<legend>
Shipping Information
</legend>
<table>
<tr><td><label for="username">Enter your name:</label></td>
<td><input type="text" name="username" id="username" maxlength="256" /></td></tr>
<tr><td><label for="email">Enter your E-Mail address:</label></td>
<td><input type="email" name="email" id="email" maxlength="256" /></td></tr>
<tr><td><label for="city">ENTER YOUR ADDRESS:</label></td>
	<td><input type="text" id="addr" width="500"></td></tr>
<tr><td><label for="addr">Enter your Address:</label></td>
<td><input type="text" id="addr" width="500"></td></tr>
<tr><td><label for="ph">Enter your Phone Number:</label></td>
<td><input type="tel" id="ph" onChange="check();" width="500"></td></tr>
<tr><td colspan="2"><input type="submit" value="Place Order"></td></tr>
</table>
</fieldset>
</form>

</div>
<br>
<section class="Newsletter">
    <h2 style="padding: 0.9em;"> Learn about new offers and get more <br>deals by joining our Newsletter</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;  margin-bottom: 2em;">Sign Up</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Learn about new offers and get more deals by joining our Newsletter</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
  </form>
</div>
</section>

<footer>
    <div class="footer">
        <p>2020 All Rights Reserved By Group4</p>
    </div>
</footer>

</body>
</html>
