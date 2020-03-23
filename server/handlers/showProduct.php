<?php 
$dsn=mysqli_connect("localhost","root","root","pickbook");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
    //display products
    function getPro()
    {
    
        global $dsn;
        
        //display products when not set category_id 
        if((!isset($_GET['category_id']))){
            $get_pro="select * from products ";
            $run_pro=@mysqli_query($dsn,"SET NAMES utf8");
            $run_pro=@mysqli_query($dsn,"SET CHARACTER SET utf8");
            $run_pro=mysqli_query($dsn,$get_pro);
            while($row_pro=mysqli_fetch_array($run_pro))
            {
                
                $pro_id=$row_pro['product_id'];
                $pro_cat=$row_pro['product_cat'];
                $pro_title=$row_pro['product_name'];
                $pro_price=$row_pro['unit_price'];
                $quantity=$row_pro['quantity'];
                $pro_desc=$row_pro['description'];
                $pro_image=$row_pro['image'];
                
                echo"
                <div class='col-md-3 col-sm-6'>
                    <div class='product-grid4'>
                        <div class='product-content'>
                           <h3 class='title'>$pro_title</h3>
                           <div class='price'>$$pro_price<span> </span></div>
                           <img width='130' height='200' src='$pro_image' alt='image' />                           
                           <a class='add-to-cart' href='index.php?add_cart=$pro_id'>ADD TO CART</a>
                        </div>
                    </div> 
                </div>";
            }
        }
    }

    //getting categories
    function getCat()
    {
        global $dsn;
        $get_cat="select * from categories";
        $run_cat=@mysqli_query($dsn,"SET NAMES utf8");
        $run_cat=@mysqli_query($dsn,"SET CHARACTER SET utf8");
        $run_cat=@mysqli_query($dsn,$get_cat);
        while($row_cat=@mysqli_fetch_array($run_cat))
        {
            $category_id=$row_cat['category_id'];
            $categoryName=$row_cat['categoryName'];
            echo "<a href='index.php?category_id=$category_id'>$categoryName</a>";
        }
        
    }




    //display products when set category_id 
    function getCatPro()
    {   
        global $dsn;
        if(isset($_GET['category_id'])){
            
            $pro_cat_id=$_GET['category_id'];
            //query getting products of cat
            $get_pro="select * from products where  product_cat='$pro_cat_id' ";
            
            //query getting name of category
            $get_cat_name="select categoryName from categories where category_id='$pro_cat_id' ";
            
            $run_pro=@mysqli_query($dsn,"SET NAMES utf8");
            $run_pro=@mysqli_query($dsn,"SET CHARACTER SET utf8");
            $run_pro=mysqli_query($dsn,$get_pro);
            $run_cat_name=mysqli_query($dsn,$get_cat_name);
            
            //display name of category
            while($row_cat_name=mysqli_fetch_array($run_cat_name))
            {
                $pro_cat_name=$row_cat_name['categoryName'];
                // echo"<h2>$pro_cat_name</h2>";
            }           
            
            //display message when empty of category
            $cunt_pro_cat=mysqli_num_rows($run_pro);
            if($cunt_pro_cat==0)
            {
                echo"<br/><br/><b><h3 class='no-cat-pro'>Unfortunately, there are no specific products in this category</h3></b>";          
            }
                        
            //display products of category
            while($row_pro=mysqli_fetch_array($run_pro))
            {
                
                $pro_id=$row_pro['product_id'];
                $pro_cat=$row_pro['product_cat'];
                $pro_title=$row_pro['product_name'];
                $pro_price=$row_pro['unit_price'];
                $pro_desc=$row_pro['description'];
                $pro_image=$row_pro['image'];
                
                echo"
                <div class='col-md-3 col-sm-6'>
                    <div class='product-grid4'>
                        <div class='product-content'>
                           <h3 class='title'>$pro_title</h3>
                           <div class='price'>$$pro_price<span> </span></div>
                           <img width='130' height='200' src='$pro_image' alt='image' />                       
                           <a class='add-to-cart' href='index.php?add_cart=$pro_id'>ADD TO CART</a>
                        </div>
                    </div> 
                </div>";
            }
        }
    }


?>

