<?php 

	function cart()
	{
		global $dsn;
		
		if(isset($_GET['add_cart']))
		{
			$pro_id=$_GET['add_cart'];
			
			if(isset($_COOKIE["ipUserEcommerce"]))
			{
				$ip	= $_COOKIE["ipUserEcommerce"];
			}else{
				$ip=getIp();
				setcookie('ipUserEcommerce',$ip,time()+1206900);
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




 	function getIp()
	{
 		$ip=$_SERVER['REMOTE_ADDR'];

 		if(!empty($_SERVER['HTTP_CLIENT_IP']))
		{
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}

		elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];	
		}
		return $ip;
	}

function total_items()

{

	if (isset($_GET['add_cart'])) {
		global $dsn;
		' <span style="background-color: #ff0000;" data-mce-style="background-color: #ff0000;">  ';
		if (isset($_COOKIE["ipUserEcommerce"])) {
			$ip	= $_COOKIE["ipUserEcommerce"];
		} else {
			$ip = getIp();
			setcookie('ipUserEcommerce', $ip, time() + 1206900);
		}
		'</span>';


		$get_items = "select * from cart where ip_add='$ip'";

		$run_items = @mysqli_query($dsn, $get_items);

		$count_items = @mysqli_num_rows($run_items);
	} else {

		global $con;
		'<span style="background-color: #ff0000;" data-mce-style="background-color: #ff0000;">';
		if (isset($_COOKIE["ipUserEcommerce"])) {
			$ip	= $_COOKIE["ipUserEcommerce"];
		} else {
			$ip = getIp();
			setcookie('ipUserEcommerce', $ip, time() + 1206900);
		}
		'</span>';
		$get_items = "select * from cart where ip_add='$ip'";

		$run_items = @mysqli_query($con, $get_items);

		$count_items = @mysqli_num_rows($run_items);
	}

	echo $count_items;
}
	
	function total_price()
	{
		$total = 0;
		
		global $dsn;
		
		//creating or using cookie 
		if(isset($_COOKIE["ipUserEcommerce"]))
		{
			$ip	= $_COOKIE["ipUserEcommerce"];
			}else{
			$ip=getIp();
			setcookie('ipUserEcommerce',$ip,time()+1206900);
		}
		
		$sel_price = "select * from cart where ip_add='$ip'";
		
		$run_price = mysqli_query($dsn,$sel_price);
		
		while($p_price = mysqli_fetch_array($run_price))
		
		{
			$pro_id = $p_price['p_id'];
			
			$pro_qty = $p_price['qty'];
			
			$pro_price = "select * from products where product_id='$pro_id'";
			
			$run_pro_price = mysqli_query($dsn,$pro_price);
			
			while($pp_price = mysqli_fetch_array($run_pro_price))
			
			{
				$product_price = array($pp_price['unit_price']*$pro_qty);
				
				$values = array_sum($product_price);
				
				$total += $values;
				
			}
			
		}
		
		echo $total." $ ";	
	}








?>