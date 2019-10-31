<?php 
require_once("include/header.php"); 
$pid =$_GET["pid"]; 
if(isset($_POST["addToCart"])){
	addToCart($db, $pid, $ip_add);
	// header("location:detailproduct.php");
} 
?>

 	<main class="main">
 		<div class="product">
	        	<?php getDetailProduct($db, $pid);?>
	        	<input type="submit" name="addToCart" value="Mua Ngay" class="buy">
	        	<hr>
	        	<span style = "color:#757575">Liên hệ: </span>
	        	<div class="icon">
					<img src="images/facebook.png" class="cat_icon" />
					<img src="images/twitter.png" class="cat_icon" />
					<img src="images/vimeo.png" class="cat_icon" />
					<img src="images/flickr.png" class="cat_icon" />
					<img src="images/rss.png" class="cat_icon" />
	        	</div>
        	</form>
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