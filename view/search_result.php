<?php include "../includes/header.php" ?>
<?php
$search = $_GET["search"];
?>
<div class="sign-in" style="margin-bottom: 200px;">
	<div class="row">
		<div class="col-sm-12">
			<?php require_once("connectdb.php");
			$sql = "SELECT * FROM product where product_name LIKE '%".$search."%'";
			$result = mysqli_query($connect,$sql);
			$totalRows = mysqli_num_rows($result);
			if($totalRows>0){
				$i=0;
			// Sử dụng vòng lặp để duyệt kết quả truy vấn
				?>
				<h3 style="color: orange;">Có <?=$totalRows?> Kết quả</h3>
				<div class="row">
					<?php
					while ($row = mysqli_fetch_array ($result))
					{
						$i+=1;
						?>
						<div class="col-sm-3">
							<div class="card new-card"  data-imgpro = 'url("<?=$row["product_image"]?>")' data-name = "<?=$row["product_name"]?>" data-description = "<?=$row["description"]?>">
								<a href="detail.php?id=<?=$row["product_id"]?>"><img class="card-img-top" src="<?=$row["product_image"]?>"alt="Card image cap"></a>
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
	</div>
	<div class="col-sm-2">
	</div>
	<!-- <div class="col-sm-4" style="margin-top: 100px;">
		<img src="https://images-na.ssl-images-amazon.com/images/I/71Eoo0-UaCL._SX385_.jpg" alt="">
	</div> -->
</div>
</div>
<?php include "../includes/footer.php" ?>