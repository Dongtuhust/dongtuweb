<script src="../js/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="../js/style.js"></script>
<?php
session_start();
require_once("connectdb.php");
$tongtien = 0;
$id = $_POST["id"];
if (!isset($_SESSION['cart'][$id])) {
	$_SESSION['cart'][$id] = 1;
}
foreach ($_SESSION['cart'] as $id => $soluong) {
	$arr[] = "'".$id."'";
	// unset($_SESSION['cart'][$id]);
}
$str = implode(",",$arr);
$sql = "Select * from product where product_id in ($str)";
$result = mysqli_query($connect,$sql);
?>
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
					while ($row = mysqli_fetch_array ($result)) {

						?>
						<div class="media">
							<span style="width: 50px;padding: 5px;margin-right: 15px;" ><img style="width: 50px;height: 50px;" src="<?=$row["product_image"]?>" alt=""></span>
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
							<span style="position: absolute;right: 15px;cursor: pointer;" data-quatity="<?=$row["product_id"]?>" class="del"><i class="far fa-times-circle"></i></span>
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
				}else{
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
				<button type="button" class="btn btn-success reset" data-dismiss="modal">Refresh</button>
			</div>
		</div>
	</div>
</div>