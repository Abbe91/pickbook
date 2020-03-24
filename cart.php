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

<body>
    <header>
        <div class="header">
            <a href="./index.php" class="logo"><img src="./img/Group_13_bo_pattern.png" style="width:100px;" alt=""></a>
            <div class="header-center">

            </div>
            <div class="header-right">
                <a><input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category"></a>
                <a></a>
                <a class="active" onclick="location.href='login.html'"><img src="./img/login@2x.png" style="width: 30px; color: aliceblue;" alt=""> <?php if (isset($_SESSION["myemail"])) {
                                                                                                                                                        echo $_SESSION["myemail"];
                                                                                                                                                    }  ?>login</a>
                <a class="active" onclick="location.href='logout.php'"><img src="./img/login@2x.png" style="width: 30px; color: aliceblue;" alt="">logout</a>
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
                <a class="active" href="#home">

                    <?php
                    if (isset($_GET['add_cart'])) {
                        cart();
                        echo "Added to cart :";
                        echo "<span > </span>";
                        total_items();
                        echo "<span> </span>";
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
    <div class="container">
        <div class="cleaner_with_height">&nbsp;</div>
        <?php
        '<span style="background-color: #ff0000;" data-mce-style="background-color: #ff0000;">';
        if (isset($_COOKIE["ipUserEcommerce"])) {
            $ip    = $_COOKIE["ipUserEcommerce"];
        } else {
            $ip = getIp();
            setcookie('ipUserEcommerce', $ip, time() + 1206900);
        }
        '</span>';
        if (isset($_POST['update_cart'])) {
            if (isset($_POST['remove'])) {
                foreach ($_POST['remove'] as $remove_id) {
                    $delete_product = "delete from cart where ip_add='$ip' AND p_id='$remove_id'";
                    $run_delet = @mysqli_query($dsn, $delete_product);
                    if ($run_delet) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
        if (isset($_POST['continue'])) {
            echo "<script>window.open('index.php','_self')</script>";
        }
        ?>
        <form action="cart.php" method="post" enctype="multipart/form-data">
            <table align="center" width="100%" bgcolor="#be457c" style="border-collapse: collapse;">
                <tr align="center" style="border: 1px solid black;">
                    <td colspan="5" style="border: 1px solid black;text-align:center;background:#45AFBA;">
                        <h2 style="color: #fff"> Products you have bought :</h2>
                    </td>
                </tr>
                <tr style="border: 1px solid black;  ">
                    <th colspan="2" style="border: 1px solid black;padding: 15px;text-align:right;">Product</th>
                    <th style="border: 1px solid black;padding: 15px;text-align:right;">Number</th>
                    <th style="border: 1px solid black;padding: 15px;text-align:right;">Price</th>
                    <th style="border: 1px solid black;padding: 15px;text-align:right;">Delete</th>
                </tr>
                <?php
                $total    =    0;
                global $dsn;
                ' <span style="background-color: #45AFBA;;" data-mce-style="background-color: #ff0000;">';
                if (isset($_COOKIE["ipUserEcommerce"])) {
                    $ip    = $_COOKIE["ipUserEcommerce"];
                } else {
                    $ip = getIp();
                    setcookie('ipUserEcommerce', $ip, time() + 1206900);
                }
                '</span>';
                $sel_price    =    "select * from cart where ip_add='$ip'";
                $run_price    =    @mysqli_query($dsn, "SET NAMES SET utf8");
                $run_price    =    @mysqli_query($dsn, "SET CHARACTER SET utf8");
                $run_price    =    @mysqli_query($dsn, $sel_price);
                while ($p_price     =    @mysqli_fetch_array($run_price)) {
                    $pro_qty = $p_price['qty'];
                    $pro_id    =    $p_price['p_id'];
                    $pro_price    =    "select * from products where product_id='$pro_id'";
                    $run_pro_price    =    @mysqli_query($dsn, $pro_price);
                    while ($pp_price    =    @mysqli_fetch_array($run_pro_price)) {
                        $product_title    =    $pp_price['product_name'];
                        $product_image    =    $pp_price['image'];
                        $single_price    =    $pp_price['unit_price'];
                        $product_id    =    $pp_price['product_id'];
                ?>
                        <tr align="center" style="border: 1px solid black;background:#45AFBA;">
                            <td style="padding: 15px;">
                                <?php echo $product_title ?>
                            </td>
                            <td style="padding: 15px;">
                                <img src="<?php echo $product_image ?>" width="60" height="90">
                            </td>
                            <td style="padding: 15px;">
                                <?php
                                if (isset($_POST['update_cart'])) {
                                    $str_ip = str_replace(".", "", "$ip");
                                    $qty = $_POST["$str_ip$product_id"];
                                    $update_qty = "update cart set qty='$qty' where p_id='$product_id' ";
                                    $run_qty = @mysqli_query($dsn, $update_qty);
                                    $_SESSION["$str_ip"]["$product_id"] = $qty;
                                }
                                $str_ip = str_replace(".", "", "$ip");
                                if (isset($_SESSION["$str_ip"]["$product_id"])) {
                                    echo "<input type='text' size='4' name='$str_ip$product_id' value='" . $_SESSION["$str_ip"]["$product_id"] . "'>";
                                    $quantity = $_SESSION["$str_ip"]["$product_id"];
                                    $total += ($single_price * $quantity);
                                } else {
                                    echo "<input type='text' size='4' name='$str_ip$product_id' value='$pro_qty'>";
                                    $total += ($single_price * $pro_qty);
                                }
                                ?>
                            </td>
                            <td style="padding: 15px;">
                                <?php echo $single_price ?>
                            </td>
                            <td style="padding: 15px;">
                                <input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>" />
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
                <tr align="center" style="border:1px solid black;background:#45AFBA;">
                    <td style="padding:15px;">
                        <input type="submit" name="continue" value="Continue shopping" />
                    </td>
                    <td></td>
                    <td>
                        <button name="checkout">
                        Checkout
                        </button>
                    </td>

                    <td></td>

                    <td>
                        <input type="submit" name="update_cart" value="Update your purchases" />
                    </td>

                </tr>

                <tr align="left" style="border:1px solid black;">

                    <td colspan="4" style="padding: 15px;">
                        <b>Total Price:</b>
                    </td>

                    <td style="padding: 15px;">
                        <b><?php echo $total . " $ "; ?></b>
                    </td>

                </tr>

            </table>

        </form>

        <div class="cleaner_with_height">&nbsp;</div>
    </div>
    </div>
    <section class="Newsletter">
        <div>
            <div class="container">
                <h1>Learn about new offers and get more deals by joining our Newsletter</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <table>
                    <tr>
                        <td><label for="email"><b>Email </b></label> </td>
                        <td> <input type="text" placeholder="Enter Email" name="emailForNewsLetter" required></td>
                    </tr>
                    <tr>
                        <td><label for="psw"><b>Name </b></label></td>
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
                        <td><label for="email"><b>Email </b></label> </td>
                        <td><input type="text" placeholder="Enter Your email" name="deleteOneEmail"></td>
                    </tr>
                </table>
                <div>
                    <button type="submit" onclick="deletNewsletter()" class="signupbtn">Unsubscribe</button>
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