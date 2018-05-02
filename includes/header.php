<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/ >
	<link href=’http://fonts.googleapis.com/css?family=Ruge+Boogie’ rel=’stylesheet’ type=’text/css’> 
	<script src="../js/fontawesome-all.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="../js/style.js"></script>
</head>
<body>
	<!--header-->
	<div id="header">
		<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
			<a class="navbar-brand" href="#" style="padding-bottom: 10px;">Ps4 Store</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Trang chủ<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="user_sell.php">Đĩa cũ</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Thể Loại
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="bansung.php">Bắn súng</a>
							<a class="dropdown-item" href="thethao.php">Thể thao</a>
							<a class="dropdown-item" href="doikhang.php">Đối kháng</a>
							<a class="dropdown-item" href="nhapvai.php">Nhập vai</a>
							<a class="dropdown-item" href="kinhdi.php">Kinh dị</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<?php
					if (isset($_SESSION['user_id']) && ($_SESSION['email'] != "admin@gmail.com")){
						?>
						<!-- <a href="#">Tài khoản: <?php echo $_SESSION['username']; ?></a>
							<a href="logout.php">Đăng suất</a> -->
							<span  id="cartshop" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal">
								<span><i class="fas fa-shopping-cart" style="margin-right: 2px;" ></i></span>
								<span style="margin-right: 2px;" id="count-item" data-count="<?php
								if (isset($_SESSION['cart'])) {
									echo count($_SESSION['cart']);
								}else echo 0;
								?>">
								<?php if (isset($_SESSION['cart'])) {
									echo count($_SESSION['cart'])." Item";
								}
								?>
							</span>
							<span><i class="fa fa-chevron-down" style="margin-right: 20px;"></i></span>
						</span>
						<span style="margin-right: 5px;" href="#">Tài khoản: <?php echo $_SESSION['username']; ?></span>
						<a href="logout.php"><button type="button" class="btn btn-outline-warning">Đăng suất</button></a>
						<?php
					} else {
						?>
						<span  id="cartshop" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal" >
							<span><i class="fas fa-shopping-cart" style="margin-right: 2px;" ></i></span>
							<span style="margin-right: 2px;">
								<?php if (isset($_SESSION['cart'])) {
									echo count($_SESSION['cart'])." Item";
								}
								?>
							</span>
							<span><i class="fa fa-chevron-down" style="margin-right: 20px;"></i></span>
						</span>
						<a href="signup.php"><button type="button" class="btn btn-outline-dark">Đăng ký</button></a>
						<a href="login.php"><button type="button" class="btn btn-outline-warning">Đăng nhập</button></a>
						<?php
					}
					?>
					<!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
					</form>
				</div>
			</nav>
		</div>
		<!-- Dialog hiển thị thông tin giỏ hàng ========================================== -->
		<div id="result">
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1331321;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Giỏ hàng</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php
							if (isset($_SESSION['cart'])) {
								require_once("connectdb.php");
								foreach ($_SESSION['cart'] as $id => $soluong) {
									$arr[] = "'".$id."'";
								}
								$str = implode(",",$arr);
								$sql = "Select * from product where product_id in ($str)";
								$result = mysqli_query($connect,$sql);
								$tongtien = 0;
								while ($row = mysqli_fetch_array ($result)) {
									?>
									<div class="media">
										<span style="width: 50px;padding: 5px;margin-right: 15px;"><img style="width: 50px;height: 50px;" src="<?=$row["product_image"]?>" alt=""></span>
										<div style="display: flex;flex-direction: column;">
											<span ><?=$row["product_name"]?></span>
											<span ><?=$_SESSION['cart'][$row["product_id"]]?>*<span style="color: orange;"><?=number_format($row["price_buy"])?></span></span>
										</div>
										<div style="margin: 10px 20px ;">
											<select class="custom-select quantity-cart" data-quatity="<?=$row["product_id"]?>" >
												<?php
												for ($i=1; $i <99 ; $i++) {
													if ($i==$_SESSION['cart'][$row["product_id"]]) {
														echo "<option value='$i' selected = 'selected'>$i</option>";
													}else{
														echo "<option value='$i'>$i</option>";
													}
												}
												?>
											</select>
										</div>
										<span style="position: absolute;right: 15px;cursor: pointer;" class="del" data-quatity="<?=$row["product_id"]?>"><i class="far fa-times-circle"></i></span>
									</div>
									<hr width="80%" align="center" />
									<?php 
									$tongtien += $_SESSION['cart'][$row["product_id"]]*$row["price_buy"];
								}
								?>
								<hr width="80%" align="center" />
								<div style="text-align: right;">Tổng tiền:
									<span style="color: orange;"><?=number_format($tongtien)?> VNĐ</span>
								</div>
								<?php
							}
							else{
								?>
								<h5 style="color: orange;">Ko có sản phẩm nào trong giỏ hàng</h5>
								<hr width="80%" align="center" />
								<div style="text-align: right;">Tổng tiền: 
									<span style="color: orange;">0 VNĐ</span>
								</div>
								<?php
							}
							?>
						</div>
						<div class="modal-footer">
							<a href="order.php"><button type="button" class="btn btn-primary">Thanh toán</button></a>
							<button type="button" class="btn btn-success reset" >Refresh</button>
						</div>
					</div>
				</div>
			</div>
		</div>
