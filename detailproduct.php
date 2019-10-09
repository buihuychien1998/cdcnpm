<!DOCTYPE html>
<html>
<head>
	<title>Detail Product</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="detailproductStyle.css">
	<link rel="stylesheet" href="functions.php">
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

 	<main class="main">
 		<div class="product">

	        <div class="left">
	        	<a href="work_detail.html"><img src="images/templatemo_image_01.jpg" alt="image 1" /></a>
	        </div>

	        <div class="center">
	        	<h3>Macbook Air 12 inch 2019 – Like new</h3>
	        	<span style = "color:red"><b>24,000,000 ₫</b></span>
	        	<ul>
	        		<li>Phụ kiện: Theo máy có sạc zin 60W</li>
	        		<li>Bảo hành: Bảo hành toàn bộ máy: 12 tháng
						Xem chi tiết tại mục BẢO HÀNH</li>
					<li>Thông số tóm tắt:
					CPU: Intel, Core i5 Broadwell, 5257U, 2.70 GHz
					RAM: DDR3L(On board), 8 GB, 1866 MHz
					Đĩa cứng: SSD, 256 GB
					Đồ họa: Intel Iris Graphics 6100</li>
	        	</ul>
	        	<input type="Button" name="buynow" value="Mua Ngay" class="buy">
	        	<hr>
	        	<span style = "color:#757575">Danh mục: </span>
	        	<div class="icon">
					<img src="images/facebook.png" class="cat_icon" />
					<img src="images/twitter.png" class="cat_icon" />
					<img src="images/vimeo.png" class="cat_icon" />
					<img src="images/flickr.png" class="cat_icon" />
					<img src="images/rss.png" class="cat_icon" />
	        	</div>
	        </div>

	        <div class="right">
	        	<ul class="none">
	        		<li><i class="fa fa-phone"></i> Đổi trả 10 ngày </li>
	        		<li><i class="fa fa-phone"></i> Giao hàng tận nhà toàn quốc</li>
	        		<li><i class="fa fa-phone"></i> Thanh toán khi nhận hàng</li>
	        		<li><i class="fa fa-phone"></i> Hỗ trợ phần mềm trọn đời</li>
	        	</ul>
	        </div>
	        
 		</div>
 		<div class="detail"></div>
 	</main>
</body>
</html>