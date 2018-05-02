<?php include "../includes/header.php" ?>


<div class="background-deep bansung">

</div>
<div class = "head-title">
	<p>Bắn súng</p>
	<span >Một trải nghiệm góc nhìn</span>
	<div class="go">
		<a href="#p1" title=""><button type="button" class="btn btn-light">Go</button></a>
	</div>
</div>
<div class="container">
	<div class="hover-effect">
		<h2 class="chimuc">Tựa game bắn súng</h2>
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
					if ($row["category_id"]=="1") {
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



	</div> <!-- .hover-effect -->
</div>


<?php include "../includes/footer.php" ?>

