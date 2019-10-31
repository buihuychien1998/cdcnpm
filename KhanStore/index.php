<?php include "include/header.php" ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
				<div id="get_brand">
					<?php getBrand($db); ?>
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Products</div>
					<div class="panel-body">
						<div id="get_product">
							<!--Here we get product jquery Ajax Request-->

							<?php 
							if (!isset($_POST["search"])) {
								$currentPage = isset($_GET["page"]) ? $_GET["page"] : 0; 
								$selected_brand = isset($_GET["bid"]) ? $_GET["bid"] : "";
								getProduct($db, $selected_brand, $currentPage);
							}else{
								$selected_brand = "";
								search($db);
							
							}
								?>
							
						</div>
					</div>

					<div class="panel-footer">&copy; 2019</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="row">
			<div class="col-md-12">
				<center>
					<ul class="pagination">

						<?php
							if (!$selected_brand || !!empty($selected_brand)) {
								pagination($db);
							}
							?>
					</ul>
				</center>
			</div>
		</div>

</body>
</html>
















































