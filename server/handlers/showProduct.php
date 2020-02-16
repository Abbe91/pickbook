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
            echo "<a href='productSidan.php?category_id=$category_id'>$categoryName</a>";
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
                           <a class='add-to-cart' href='index.php?add_cart=$pro_id'>ADD TO CART</a>
                        </div>
                    </div> 
                </div>";
            }
        }
    }


	//getting IP User
	function getIp()
	{
//whether ip is from remote address		
		$ip=$_SERVER['REMOTE_ADDR'];

//whether ip is from share internet		
		if(!empty($_SERVER['HTTP_CLIENT_IP']))
		{
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}

//whether ip is from proxy		
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];	
		}
		return $ip;
    }



    	//creating the shopping cart
	//import attribute product and IP address user with press buy button in cart table
	function cart()
	{
		global $dsn;
		
		if(isset($_GET['add_cart']))
		{
			$pro_id=$_GET['add_cart'];
			
			//creating or using cookie 
			if(isset($_COOKIE["ipUserPickBook"]))
			{
				$ip	= $_COOKIE["ipUserPickBook"];
			}else{
				$ip=getIp();
				setcookie('ipUserPickBook',$ip,time()+1206900);
			}
			
			$check_pro="select * from cart where p_id='$pro_id' AND ip_add='$ip' ";
			$run_check=@mysqli_query($dsn,$check_pro);
			if(@mysqli_num_rows($run_check)>0)
			{
				echo "";
			}
			else
			{
				$insert_pro="insert into cart (p_id,ip_add,qty)values('$pro_id','$ip',1)";
				$run_insert_pro=@mysqli_query($dsn,$insert_pro);
			}
		}
	}


















?>

