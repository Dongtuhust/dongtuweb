<?php include "../includes/header.php" ?>
<?php
$id = $_GET["id"];
?>
<?php
require_once("connectdb.php");
$sql = "SELECT * FROM product,category where product_id=$id and product.category_id=category.category_id";
$result = mysqli_query($connect,$sql);
$totalRows = mysqli_num_rows($result);
if($totalRows>0){
	$i=0;
			// Sử dụng vòng lặp để duyệt kết quả truy vấn
	while ($row = mysqli_fetch_array ($result))
	{
		$category_id = $row["category_id"];
		$i+=1;
		?>
		<div class="background-deep" style="background-image: url(<?=$row["product_image"]?>);">

		</div>
		<div class = "head-title">
			<p><?=$row["product_name"]?></p>
			<span>Ps4 Dongtu Store</span>
			<div class="go">
				<a href="#p1" title=""><button type="button" class="btn btn-light">Go</button></a>
			</div>
		</div>
		<div class="content">
			<div class="product">
				<div class="description">
					<div class="img-product" style="background-image: url(<?=$row["detail_image"]."/product2.jpg"?>);">
					</div>
					<div class="text-description">
						<div class="text-name">
							<span class="name"><?=$row["product_name"]?></span><br>
							<span class="price"><?=$row["price_buy"]?></span><br>
							<span class="text-detail head" >Hãng sản xuất :</span>
							<span class="text-detail" ><?=$row["distributor_name"]?></span><br>
							<span class="text-detail head" >Thể loại :</span>
							<span class="text-detail" ><?=$row["category_name"]?></span><br>
							<span class="text-detail head" >Bảo hành :</span>
							<span class="text-detail" >12 tháng </span><br>
							<span class="text-detail head" >Mô tả :</span>
							<div class="mota">
								<p><?=$row["description"]?></p><br>
							</div>
							<span class="text-detail head" style="">Lựa chọn :</span>
							<div style="display: block;margin-top:10px; " >
								<a href="">
									<button data-id="<?php
									if(isset($_SESSION['user_id'])){ echo 1;}else echo 0;
									?>"
									type="button" class="btn btn-outline-warning btn-buy-now" data-product=<?=$row["product_id"]?>><i class="fa fa-shopping-cart"></i>
								</button>
							</a>
							<select  style="width: 150px;height: 37px;" class="custom-select quantity-cart" data-quatity="<?=$row["product_id"]?>" >
								<option selected>Số lượng</option>
								<?php
								for ($i=1; $i <20 ; $i++) {
									echo "<option value='$i'>$i</option>";
								}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div style="display: flex;height: 70px;width: 200px;margin-left : 100px;">
				<?php 
				for ($i=1; $i <4 ; $i++) {
					?>
					<span class="list-img-product" style="background-image: url(<?php echo $row["detail_image"]."/product".$i.".jpg";?>);" data-img = "url('<?php echo $row["detail_image"]."/product".$i.".jpg";?>')">
					</span>
					<?php
				}
				?>
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
<div class="list-pro">
	<span class="price">Sản phẩm tương tự </span>
	<div class="row">
		<?php
		require_once("connectdb.php");
		$sql = "SELECT * FROM product";
		$result = mysqli_query($connect,$sql);
		$totalRows = mysqli_num_rows($result);
		if($totalRows>0){
			$i=0;
			// Sử dụng vòng lặp để duyệt kết quả truy vấn
			while ($row = mysqli_fetch_array ($result))
			{
				$i+=1;
				if ($row["category_id"]==$category_id&&$row["product_id"]!=$id) {
					?>
					<div class="col-sm-3">
						<div class="card">
							<a href="detail.php?id=<?=$row["product_id"]?>"><img class="card-img-top" src="<?=$row["product_image"]?>" alt="Card image cap"></a>
							<div class="card-body">
								<h5 class="card-title"><?=$row["product_name"]?></h5>
								<p class="card-text"><?=number_format($row["price_buy"])?></p>
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
</div>
</div>

<?php include "../includes/footer.php" ?>
