<?php
session_start();
function pagination($db){
	$product_query = "SELECT * FROM products";
	$run_query = mysqli_query($db->getConn(),$product_query);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/6);
	for($i=1;$i<=$pageno;$i++){
		echo ("<li><a href='?page=$i'>$i</a></li>");
	}

}
function getBrand($db){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($db->getConn(),$brand_query);
	echo "
		<ul class='nav nav-pills nav-stacked'>
			<li class='active'><a href='?bid='''><h4>Brands</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo ("<li><a href='?bid=$bid'>$brand_name</a></li>");
		}
		echo "</ul>";
	}
}

function getProduct($db, $bid, $page)
{
	$limit = 6;
	if ($page != 0) {
		$start = ($page * $limit) - $limit;
	}else{
		$start = 0;
	}
	$condition = ($bid == null || $bid == "") ? "1" : "product_brand = $bid";
	$product_query = "SELECT * FROM products WHERE $condition LIMIT $start,$limit";
	printProduct($db, $product_query);
}
function printProduct($db, $query){
	$run_query = mysqli_query($db->getConn(), $query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo ("
				<div class='col-md-4'>
				<a href='detailproduct.php?pid=$pro_id' class='detailProduct'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>$.$pro_price.00</div>
							</div>
							</a>
						</div>	
			");
		}
	}

}
function search($db){
	$keyword = $_POST["keyword"];
	$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	printProduct($db, $sql);
}

function getDetailProduct($db, $pid){
	$query = "SELECT * FROM products WHERE product_id = $pid";
	$run_query = mysqli_query($db->getConn(), $query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_desc = $row['product_desc'];
			$pro_image = $row['product_image'];
			echo ("
				<form method='POST'>
					<div class=\"left\">
		        		<img src=\"product_images/$pro_image\" alt=\"product_image\" style='width: 200px; height:250px'/>
		        	</div>

			        <div class=\"center\">
		        		<h3>$pro_title</h3>
			        	<span style = \"color:red\"><b>$.$pro_price.00</b></span>
			        	<ul>
			        		<li>Mô tả sản phẩm: $pro_desc</li>
			        	</ul>
				        	
			");
		}
	}
}

function addToCart($db, $p_id, $ip_add){
		if(isset($_SESSION["uid"])){
			$user_id = $_SESSION["uid"];

			$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
			$run_query = mysqli_query($db->getConn(),$sql);
			$count = mysqli_num_rows($run_query);
			if($count > 0){
				echo("
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>
				");
			} else {
				$sql = "INSERT INTO `cart`
				(`p_id`, `ip_add`, `user_id`, `qty`) 
				VALUES ('$p_id','$ip_add','$user_id','1')";
				if(mysqli_query($con,$sql)){
					
					// echo("
					// 	<div class='alert alert-success'>
					// 		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					// 		<b>Product is Added..!</b>
					// 	</div>
					// ");
					echo "<script type='text/javascript'>window.top.location='http://localhost:8080/BTLPHP/cdcnpm/KhanStore/detailproduct.php?pid=$p_id';</script>";  
					echo "<script type='text/javascript'>alert('Product is Added..!');</script>";
				}
			}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($db->getConn(),$sql);
			if (mysqli_num_rows($query) > 0) {
				
				echo("
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>");
			}else{
				$sql = "INSERT INTO `cart`
				(`p_id`, `ip_add`, `user_id`, `qty`) 
				VALUES ('$p_id','$ip_add','-1','1')";
				if (mysqli_query($db->getConn(),$sql)) {

					// echo("
					// 	<div class='alert alert-success'>
					// 		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					// 		<b>Your product is Added Successfully..!</b>
					// 	</div>
					// ");
					echo "<script type='text/javascript'>window.top.location='http://localhost:8080/BTLPHP/cdcnpm/KhanStore/detailproduct.php?pid=$p_id';</script>"; 
					echo "<script type='text/javascript'>alert('Product is Added..!');</script>";
				}
			}
			
		}
		
}

	

//Count User cart item
function countItem($db, $ip_add){
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($db->getConn(),$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
}

//Count User cart item

//Get Cart Item From Database to Dropdown menu
function getCart($db, $ip_add){
	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($db->getConn(),$sql);
	//display cart item in dropdown menu
	if (mysqli_num_rows($query) > 0) {
		$n=0;
		while ($row=mysqli_fetch_array($query)) {
			$n++;
			$product_id = $row["product_id"];
			$product_title = $row["product_title"];
			$product_price = $row["product_price"];
			$product_image = $row["product_image"];
			$cart_item_id = $row["id"];
			$qty = $row["qty"];
			echo '
				<div class="row">
					<div class="col-md-3">'.$n.'</div>
					<div class="col-md-3"><img class="img-responsive" src="product_images/'.$product_image.'" /></div>
					<div class="col-md-3">'.$product_title.'</div>
					<div class="col-md-3">$'.$product_price.'</div>
				</div>';
			
		}
		?>
			<a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
		<?php
	}
}

function checkOutDetails($db, $ip_add){
	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($db->getConn(),$sql);
	if (mysqli_num_rows($query) > 0) {
		//display user cart item with "Ready to checkout" button if user is not login
		echo "<form method='post' action='cart.php'>";
			$total=0;
			while ($row=mysqli_fetch_array($query)) {
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$total += $product_price * $qty;
				echo( 
					'<div class="row">
							<div class="col-md-2">
								<div class="btn-group">
									<button type="submit" name="removeItemFromCart" class="btn btn-danger remove" ><span class="glyphicon glyphicon-trash"></span></button>
									<button type="submit" name="updateCartItem" class="btn btn-primary update"
									 ><span class="glyphicon glyphicon-ok-sign"></span></button>
								</div>
							</div>
							<input type="hidden" name="product_id" value="'.$product_id.'"/>
							<input type="hidden" name="" value="'.$cart_item_id.'"/>
							<div class="col-md-2"><img class="img-responsive" src="product_images/'.$product_image.'"></div>
							<div class="col-md-2">'.$product_title.'</div>
							<div class="col-md-2"><input type="text" class="form-control qty" name = "quantity" value="'.$qty.'" ></div>
							<div class="col-md-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
							
						</div>');
			}
			
			echo ("<div class=\"row\">
						<div class=\"col-md-8\"></div>
						<div class=\"col-md-4\">
							<b class=\"net_total\" style=\"font-size:20px;\">Total: $ $total</b>
				</div>");
			if (!isset($_SESSION["uid"])) {
				echo('<input type="submit" style="float:right; margin-right: 5px;" name="login_user_with_product" class="btn btn-info btn-lg" value="Ready to Checkout" >
						</form>');
				
			}else if(isset($_SESSION["uid"])){
				//Paypal checkout form
				echo('
					</form>
					<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="business" value="shoppingcart@khanstore.com">
						<input type="hidden" name="upload" value="1">');
						  
						$x=0;
						$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
						$query = mysqli_query($db->getConn(),$sql);
						while($row=mysqli_fetch_array($query)){
							$x++;
							echo('<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
							  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
							     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
							     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">');
							}
						  
						echo('<input type="hidden" name="return" value="http://localhost/project1/payment_success.php"/>
				                <input type="hidden" name="notify_url" value="http://localhost/project1/payment_success.php">
								<input type="hidden" name="cancel_return" value="http://localhost/project1/cancel.php"/>
								<input type="hidden" name="currency_code" value="USD"/>
								<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
								<input style="float:right;margin-right:80px;" type="image" name="submit"
									src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal Checkout"
									alt="PayPal - The safer, easier way to pay online">
							</form>');
			}
		}	
}

	

//Remove Item From cart
function removeItemFromCart($db, $ip_add){
	$pid = $_POST["product_id"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$pid' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$pid' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($db->getConn(),$sql)){
		echo ("<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>");
	}
}



//Update Item From cart
function updateCartItem($db, $ip_add){
	$pid = $_POST["product_id"];
	$qty = $_POST["quantity"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$pid' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$pid' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($db->getConn(),$sql)){
		echo("<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>");
	}
}





?>






