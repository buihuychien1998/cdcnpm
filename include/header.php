<?php 
$limit = 8;
if(isset($_GET["page"])){
	$page = $_GET['page'];
	settype($page, "int");

}else{
	$page = 1;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>

	<link rel="stylesheet" href="indexstyle.css">
	<link rel="stylesheet" href="detailproductStyle.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

 <header>
 	<div class="menu-bar">
		<ul class="">
			<li class="menu-item-logo">
				<a href=""><img class="logo"src="images/logo.png" alt=""></a>
			</li>
	    	<li class="menu-item">
	    		<a class="" href="#">Trang chủ</a>
	    	</li>
	    	<li class="menu-item">
	    		<a class="" href="#">Giới thiệu</a>
	   		 </li>
		    <li class="menu-item">
		    	<a class="" href="#">Cửa hàng</a>
		    </li>
		    <li class="menu-item">
		    	<a class="" href="#" >Liên hệ</a>
		    </li>
		    <li class="menu-item-search">
		    	<form class="form-inline my-2 my-lg-0">
	      			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	     			 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    		</form>
		    </li>
		</ul>
	</div>
 </header>
