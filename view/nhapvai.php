<?php include "../includes/header.php" ?>


<div class="background-deep nhapvai">
	
</div>
<div class = "head-title">	
	<p>Nhập vai</p>
	<p style="font-size: 30px">Hòa mình vào các siêu anh hùng</p>
	<div class="go">
		<a href="#p1" title=""><button type="button" class="btn btn-light">Go</button></a>
	</div>
</div>
<div class="container">
	<div class="hover-effect">
		<h2 class="chimuc">Tựa game nhập vai</h2>
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
						if ($row["category_id"]=="4") {
							?>
							<div class="col-sm-3">
								<div class="card">
									<a href="#"><img class="card-img-top" src="<?=$row["product_image"]?>" alt="Card image cap"></a>
									<div class="card-body">
										<h5 class="card-title"><?=$row["product_name"]?></h5>
										<p class="card-text"><?=$row["price_buy"]?></p>
										<a href="javascript:void(0);" title="" class="btn-buy-now"><button type="button" class="btn btn-outline-info ">Buy</button></a>
										<a href="#p1" title=""><button type="button" class="btn btn-outline-dark">Rent</button></a>
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
	</div>



</div> <!-- .hover-effect Tất cả-->
</div>

<?php include "../includes/footer.php" ?>
