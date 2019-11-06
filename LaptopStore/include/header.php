<?php
include_once "../action.php";
include "../account/login.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Laptop Store</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<script src="../js/jquery2.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<!-- <script src="main.js"></script> -->
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/detailproductStyle.css">
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
			}
		</style>
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="../main/index.php" class="navbar-brand">Laptop Store</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="../main/index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-globe"></span>News</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-envelope"></span>Support</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-earphone"></span>Contact</a></li>
			</ul>
			<form method="POST" class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" name="keyword" class="form-control" placeholder="Search" id="search">
		        </div>
		        <button type="submit" name="search" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
		     </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge"><?php countItem($db, $ip_add); ?></span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
									<?php
										getCart($db, $ip_add);
									 ?>
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				
				<?php 
					if (isset($_SESSION["uid"])) {
						echo('
							<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Hi, ' .$_SESSION["name"].'</a>
								<ul class="dropdown-menu">
									<li><a href="../cart/cart.php" style="text-decoration:none; color:blue;">Cart</a></li>
									<li class="divider"></li>
									<li><a href="customer_order.php" style="text-decoration:none; color:blue;">Orders</a></li>
									<li class="divider"></li>
									<li><a href="" style="text-decoration:none; color:blue;">Change Password</a></li>
									<li class="divider"></li>
									<li><a href="../account/logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
								</ul>
					
						</li>');
					}else{
						echo('
							<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
								<ul class="dropdown-menu">
									<div style="width:300px;">
										<div class="panel panel-primary">
											<div class="panel-heading">Login</div>
											<div class="panel-heading">
												<form id="login" method="POST">
													<label for="email">Email</label>
													<input type="email" class="form-control" name="email" id="email" required/>
													<label for="email">Password</label>
													<input type="password" class="form-control" name="password" id="password" required/>
													<p><br/></p>
													<a href="#" style="color:white; list-style:none;">Forgotten Password?</a>
													<br/>
													<div style="color:#CCCCCC;">Don\'t have account? <a href="../account/customer_registration.php" style="color:white; list-style:none;">Register</a></div>
													<input type="submit" name="login" class="btn btn-success" style="float:right;">
												</form>
											</div>
											<div class="panel-footer" id="e_msg"></div>
										</div>
									</div>
								</ul>
					</li>
					');
					}
				 ?>
				
			</ul>
		</div>
	</div>
</div>	
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>