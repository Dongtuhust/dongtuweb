<?php
	include "../includes/header.php";
	require_once("pagination.php");
	$recordPerPage = 8;
?>
<link rel="stylesheet" type="text/css" href="../css/w3s.css"/>
<div class="background-deep">
</div>
<div class = "head-title">
	<p>Welcome to PS4 shop</p>
	<div class="go">
		<a href="#p1" title=""><button type="button" class="btn btn-light">Rent</button></a>
		<a href="#p1" title=""><button type="button" class="btn btn-light">Buy</button></a>
	</div>
</div>
<!--slide show xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<!--danh mục sp -->
<!--contents-->

<!-- <div class="hover-effect">
	<div class="intro">
		<div id="animation-ps4">
		</div>
	</div>
</div> -->
<div class="container">
	<div class="col-sm-12">
		<!-- list đĩa mới xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
		<h2 class="chimuc">Đĩa mới cập nhật</h2>
		<div class="hover-effect">
			<div class="row">
				<div class="col-sm-12">
					<div class="card-view">
						<div class="avatar dist-1">
						</div>
						<div class="introduction">
							<p class="img-title">The Devition</p>
							<p class="descripes">Bộ phận The DivisionTM của Tom Clancy là một trải nghiệm RPG thực tế khiến cho thể loại này trở thành một thiết lập quân sự hiện đại lần đầu tiên.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<?php require_once("connectdb.php");
				$sql = "SELECT * FROM product";
				$result = mysqli_query($connect,$sql);
				$totalRows = mysqli_num_rows($result);
				if($totalRows>0){
					$i=0;
			// Sử dụng vòng lặp để duyệt kết quả truy vấn
					while ($row = mysqli_fetch_array ($result))
					{
						$i+=1;
						if ($row["product_status"]=="Mới") {
							?>
							<div class="col-sm-3">
								<div class="card">
									<a href="detail.php?id=<?=$row["product_id"]?>"><img class="card-img-top" src="<?=$row["product_image"]?>" alt="Card image cap"></a>
									<div class="card-body">
										<h5 class="card-title"><?=$row["product_name"]?></h5>
										<p class="card-text"><?=number_format($row["price_buy"])?>VNĐ</p>
										<button data-id="
										<?php
										if(isset($_SESSION['user_id'])){ echo 1;}else echo 0;
										?>"
										type="button" class="btn btn-outline-warning btn-buy-now" data-product=<?=$row["product_id"]?>><i class="fa fa-shopping-cart"></i>
									</button>
									<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
									</p>
								</div>
							</div>
						</div>
						<?php
					}
				}
			}else{
				?>
				<tr valign="top">
					<td >&nbsp;</td>
					<td ><b><font face="Arial" color="#FF0000">
					Khong tim thay thong tin !</font></b></td>
				</tr>
				<?php
			}
			?>


		</div>

		<div class="space60">&nbsp;</div>

	</div> <!-- .hover-effect Đĩa mới-->

	<div class="space60">&nbsp;</div>
	<h2 class="chimuc">Đĩa đang hot</h2>
	<!-- list bán chạy xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
	<div class="hover-effect">
		<div class="row">
			<div class="col-sm-12">
				<div class="card-view-2">
					<div class="avatar dist-2">
					</div>
					<div class="introduction">
						<p class="img-title">Resident Evil 7</p>
						<p class="descripes">Tiếp theo Resident Evil 5 và Resident Evil 6 , Resident Evil 7 sẽ trở lại với rễ kinh dị sống còn của franchise, với sự nhấn mạnh về thăm dò</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php require_once("connectdb.php");
			$sql = "SELECT * FROM product";
			$result = mysqli_query($connect,$sql);
			$totalRows = mysqli_num_rows($result);
			if($totalRows>0){
				$i=0;
			// Sử dụng vòng lặp để duyệt kết quả truy vấn
				while ($row = mysqli_fetch_array ($result))
				{
					$i+=1;
					if ($row["product_status"]=="Hot") {
						?>
						<div class="col-sm-3">
							<div class="card">
								<a href="detail.php?id=<?=$row["product_id"]?>"><img class="card-img-top" src="<?=$row["product_image"]?>" alt="Card image cap"></a>
								<div class="card-body">
									<h5 class="card-title"><?=$row["product_name"]?></h5>
									<p class="card-text"><?=number_format($row["price_buy"])?>VNĐ</p>
									<button data-id="<?php
									if(isset($_SESSION['user_id'])){ echo 1;}else echo 0;
									?>"
									type="button" class="btn btn-outline-warning btn-buy-now" data-product=<?=$row["product_id"]?>><i class="fa fa-shopping-cart"></i>
								</button>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							</div>
						</div>
					</div>
					<?php
				}
			}
		}else{
			?>
			<tr valign="top">
				<td >&nbsp;</td>
				<td ><b><font face="Arial" color="#FF0000">
				Khong tim thay thong tin !</font></b></td>
			</tr>
			<?php
		}
		?>
	</div>


</div> <!-- .hover-effect Đĩa bán chạy-->

<div class="space60">&nbsp;</div>
<!-- list all xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="hover-effect" id="all_product">

</div> <!-- .hover-effect Tất cả-->

</div> <!-- #container -->
</div>
<?php include "../includes/footer.php" ?>

<script>
	var page = 1;
	getAllProduct();

	function getAllProduct(){
		$.ajax({
			url: 'allProduct.php?page=' + page,
			type: 'get',
			dataType: 'text',
			data: {},
			success : function(result){
				$('#all_product').html(result);
			}
		});
	}

	function changePage(src){
		var pageNumber = src.getAttribute("page");
		if(pageNumber != page){
			page = pageNumber;
			getAllProduct();
		}
	}
</script>
