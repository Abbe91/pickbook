<?php 
session_start();
	include('../pickbook/server/handlers/showProduct.php');
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
            <a href="#default" class="logo"><img src="./img/Group_13_bo_pattern.png" style="width:100px;" alt=""></a>
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
                <a class="active" href="#home"><img src="./img/shopping_cart.png" style="width: 30px;" alt=""></a>
            </div>
        </div>
    </header>
    <div id="catNav" class="topnav">
    <a onclick="" class="active" href="./index.php">Home</a>

         <?php 
            getCat();

         ?>
    </div>
    <!-- <section>
        <div style="display: flex;">
            <div>
                <span style="font-family: Shaky Hand Some Comic; display:flex; flex-direction:column; margin-top: 6em; margin-left:20%; font-size:35px; font-weight: bold; 	color: rgba(31,64,45,1);">EDITORIAL DESIGN FROM THE WORLD’S BEST NEWSROOMS</span>
            </div>
            <div>
                <img id="Hero_book" style="width: 590px; margin: 20px;" src="./img/NewspaperDesign_gestalten_book@2x.png">
            </div>
        </div>
    </section> -->
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
    <section class="product">
        <div class="container">
            <h1 class="title-h">BOOK ON SALE TODAY</h1>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="#">
                                <img class="pic-1" src="/img/ID9780099572961@2x.png">

                            </a>
                            <ul class="social">
                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                            <span class="product-new-label">New</span>

                        </div>
                        <div class="product-content">
                            <h3 class="title">Faces in the crowd by <a href="#">Valeria Luiselli</a></h3>
                            <div class="price">
                                $14.40
                                <span>$16.00</span>
                            </div>
                            <a class="add-to-cart" href="">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="#">
                                <img class="pic-1" src="./img/ID9261016_M@2x.png">

                            </a>
                            <ul class="social">
                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                            <span class="product-discount-label">-12%</span>
                        </div>
                        <div class="product-content">
                            <h3 class="title">Cryogenic systems by <a href="#">Randall F. Barron</a></h3>
                            <div class="price">
                                $17.60
                                <span>$20.00</span>
                            </div>
                            <a class="add-to-cart" href="">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="#">
                                <img class="pic-1" src="./img/ID9780099572961@2x.png">

                            </a>
                            <ul class="social">
                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>

                            <span class="product-discount-label">-10%</span>
                        </div>
                        <div class="product-content">
                            <h3 class="title">Little Women by <a href="#">Louisa May Alcott</a></h3>
                            <div class="price">
                                $14.40
                                <span>$16.00</span>
                            </div>
                            <a class="add-to-cart" href="">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="#">
                                <img class="pic-1" src="./img/ID9780552174046@2x.png">

                            </a>
                            <ul class="social">
                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>

                        </div>
                        <div class="product-content">
                            <h3 class="title">Changing Times by <a href="#">Jack Sheffield</a></h3>
                            <div class="price">
                                $14.40
                                <span>$16.00</span>
                            </div>
                            <a class="add-to-cart" href="">ADD TO CART</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product">
        <div class="container">
            <h1 class="title-h">KIDS BOOKS</h1>
            <div class="row">
            <?php 
                 getPro();
                 getCatPro(); 

                ?> 
                <!-- <div class="col-md-3 col-sm-6">
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="#">
                                <img class="pic-1" src="./img/ID8551960_M@2x.png">

                            </a>
                            <ul class="social">
                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                            <span class="product-new-label">New</span>

                        </div>
                        <div class="product-content">
                            <h3 class="title">Faces in the crowd by <a href="#">Valeria Luiselli</a></h3>
                            <div class="price">
                                $14.40
                                <span>$16.00</span>
                            </div>
                            <a class="add-to-cart" href="">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="#">
                                <img class="pic-1" src="./img/ID9261016_M@2x.png">

                            </a>
                            <ul class="social">
                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                            <span class="product-discount-label">-12%</span>
                        </div>
                        <div class="product-content">
                            <h3 class="title">Cryogenic systems by <a href="#">Randall F. Barron</a></h3>
                            <div class="price">
                                $17.60
                                <span>$20.00</span>
                            </div>
                            <a class="add-to-cart" href="">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="#">
                                <img class="pic-1" src="./img/ID9780099572961@2x.png">

                            </a>
                            <ul class="social">
                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>

                            <span class="product-discount-label">-10%</span>
                        </div>
                        <div class="product-content">
                            <h3 class="title">Little Women by <a href="#">Louisa May Alcott</a></h3>
                            <div class="price">
                                $14.40
                                <span>$16.00</span>
                            </div>
                            <a class="add-to-cart" href="">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="#">
                                <img class="pic-1" src="./img/ID9780552174046@2x.png">

                            </a>
                            <ul class="social">
                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>

                        </div>
                        <div class="product-content">
                            <h3 class="title">Changing Times by <a href="#">Jack Sheffield</a></h3>
                            <div class="price">
                                $14.40
                                <span>$16.00</span>
                            </div>
                            <a class="add-to-cart" href="">ADD TO CART</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- <section class="Newsletter">
        <h2 style="padding: 0.9em;"> Learn about new offers and get more <br>deals by joining our Newsletter</h2>

        <button onclick="location.href='register.php'" style="width:auto;  margin-bottom: 2em;">Sign Up</button>

        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <form class="modal-content" action="/action_page.php">
                <div class="container">
                    <h1>Learn about new offers and get more deals by joining our Newsletter</h1>
                    <p>Please fill in this form to create an account.</p>
                    <hr>
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>

                    <label for="name"><b>Name</b></label>
                    <input type="text" placeholder="Enter Your Name" name="text" required>
                    
                    <label>
                        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                    </label>

                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn">Sign Up</button>
                    </div>
            </form>
            </div>
    </section> -->

    <section class="Newsletter">
    <div >

    <div class="container">
      <h1>Learn about new offers and get more deals by joining our Newsletter</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
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

      <table>
            <tr>
            <td><label for="email"><b>Email   </b></label> </td>
            <td><input type="text" placeholder="Enter Your email" name="deleteOneEmail"></td>
            </tr>
      </table>
      <div>
          <button type="submit" onclick="deletNewsletter()" class="signupbtn" >Unsubscribe</button>
      </div>
      <br>

    </div>
    </section>
    <footer>
        <div class="footer">
            <p>2020 All Rights Reserved By Group4</p>
        </div>
    </footer>
</body>

</html>