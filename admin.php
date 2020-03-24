<?php 
$dsn=mysqli_connect("localhost","root","root","pickbook");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" id="applicationStylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script defer src="./js/logic.js"></script>
    <title>PickBook</title>

</head>

<body>
<header>
        <div class="header">
            <a href="./index.php" class="logo"><img src="./img/logo.png" style="width:180px;" alt=""></a>
            <div class="header-center">   
        </div>
</header>
         
<section>
    <button onclick="showProductList();">Produkt Lista</button>
    <button onclick="showInsertSection();">Lägg till produkt</button>
    <button onclick="showOrderList();">Beställningar</button>
</section>


<section class="prodact-style">
    <div id="insertProduct">
            <h1>Lägg till produkt</h1>
            Product Category:<input type="text" name="insertProductCategory">
            <select name="product_cat" required>
                <option>Select the category you want</option>
                        <?php
    
                            $get_cat="select * from categories";
                            $run_cat=mysqli_query($dsn,$get_cat);
                            while($row_cat=mysqli_fetch_array($run_cat))
                            {
                                $cat_id=$row_cat['category_id'];
                                $cat_title=$row_cat['categoryName'];
                                echo"<option value='$cat_id'>$cat_title</option>";
                            }
                        ?>
            </select> Product Name: <input type="text" name="insertProductName"> Description: <input type="text" name="insertDescription"> Quantity: <input type="text" name="insertQuantity"> UnitPrice: <input type="text" name="insertUnitPrice">        Discount: <input type="text" name="insertDiscount"> Image: <input class="file" type="file" name="productImg" id="imageUploadInput">
            <hr>
            <input type="text" name="deleteOneProduct" placeholder="Skriv det produktens id nummer som du vill radera">
            <button onclick="deleteProduct();">Delete Product</button>
            <hr>
            <input class="file" onclick="deleteAllProduct()" type="button" name="removeAllProduct" value="Ta bort allt">
            <button onclick="insertProduct();">Add Product</button>
            <hr>
                        </div>
    
    <div id="productList">
            <h1 style="text-align: center"> Produkt Lista</h1>
            <table id="table">
                <tr>
                    <th>Product id</th>
                    <th>Product Category</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>UnitPrice</th>
                    <th>Discount</th>
                    <th>Image</th>
                    <th>Edit</th>
                </tr>
            </table>
                        </div>
    
    <div id="orderList">
    
            <h1>Beställningar</h1>
    
            <table id="orderTable">
                <tr>
                    <th>orderId</th>
                    <th>users_id</th>
                    <th>orderDate</th>
                    <th>shippingaddress</th>
                    <th>wight</th>
                    <th>total_price</th>
                </tr>
            </table>
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
            <input type="checkbox" checked="checked" name="remember"> Remember me
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