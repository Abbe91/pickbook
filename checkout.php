<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" id="applicationStylesheet" href="Style.css"/>
    <link rel="stylesheet" type="text/css" href="checkout.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="header">
            <a href="#default" class="logo"><img src="./img/Group_13_bo_pattern.png" style="width:100px;" alt=""></a>
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
        <a class="active" href="#home">Classic</a>
        <a href="#about">Kids</a>
        <a href="#contact">Thrillers</a>
        <a href="#contact">History</a>
        <a href="#contact">Romance</a>
        <a href="#contact">Discount</a>
    </div>
    <br>    
    
</body>
</html>