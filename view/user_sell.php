<?php include "../includes/header.php" ?>
<div class="hover-effect" style="height: 50px">
	<h2 style="text-align: center;">Quản lý sản phẩm do người dùng đăng bán</h2>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Chủ đĩa</th>
			<th scope="col">Ảnh</th>
			<th scope="col">Tên sản phẩm</th>
			<th scope="col">Giá mua</th>
			<th scope="col">Giá thuê</th>
			<th scope="col">Miêu tả</th>
			<th scope="col">Thể loại</th>
			<th scope="col">Tình trạng</th>
			<th scope="col">Trạng thái</th>
			<th scope="col">Chi tiết</th>
		</tr>
	</thead>
	<tbody>
		<?php require_once("connectdb.php");
		$sqlu = "SELECT * FROM product_user,users where product_user.user_email = users.email";
		$resultu = mysqli_query($connect,$sqlu);
		$totalRowsu = mysqli_num_rows($resultu);
		if($totalRowsu>0){
			$i=0;
			// Sử dụng vòng lặp để duyệt kết quả truy vấn
			while ($row = mysqli_fetch_array ($resultu))
			{
				$i+=1;
				?>
				<tr valign="top">
					<th scope="row" style="text-align: center;"><?=$row["username"]?></td>
						<td><span><img style="width: 70px;height: 50px;" class="card-img-top" src="<?=$row["product_img"]?>" alt="Card image"></span></td>
						<td><?=$row["product_name"]?></td>
						<td ><?=$row["price_buy"]?></td>
						<td ><?=$row["price_rent"]?></td>
						<td ><textarea class="form-control" rows="1"><?=$row["description"]?></textarea></td>
						<td style="text-align: center;"><?=$row["category"]?></td>
						<td style="text-align: center;"><?=$row["status"]?></td>
						<td style="text-align: center;"><?=$row["notification"]?></td>
						<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#product_user<?=$row["product_id"]?>" name="<?=$row["product_id"]?>">Mua hàng</button></td>
						<div class="modal fade" id="product_user<?=$row["product_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Thông tin khách hàng</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form method="post">
										<div class="modal-body">
											<div class="form-block">
												<label style="color: orange;">Người bán</label>
												<input type="text"  class="form-control" id="" name="nameseller" readonly value="<?=$row["username"]?>">
											</div>
											<div class="form-block">
												<label style="color: orange;">Mặt hàng</label>
												<input type="text"  class="form-control" id="" name="product_name" readonly value="<?=$row["product_name"]?>">
											</div>
											<div class="form-block">
												<label style="color: orange;">Giá</label>
												<input type="text"  class="form-control" id="price_buy" name="price_buy" readonly value="<?=$row["price_buy"]?>">
											</div>
											<div class="form-block">
												<label for="name">Họ tên người nhận*</label>
												<input type="text"  class="form-control" id="name" name="name"  required>
											</div>
											<div class="form-block">
												<label>Giới tính </label>
												<input id="gender"  type="radio" class="input-radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
												<input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>Nữ</span>
											</div>

											<div class="form-block">
												<label for="adress">Địa chỉ*</label>
												<input type="text" class="form-control" id="adress" name="address" required>
											</div>

											<div class="form-block">
												<label for="phone">Điện thoại*</label>
												<input type="text" class="form-control" id="phone" name="phone" required>
											</div>
											<div class="form-block">
												<label for="notes">Ghi chú</label>
												<textarea class="form-control" id="notes" name="note" rows="5"></textarea>
											</div>
											<span>
												<input type="radio" class="radio-ship" name="payment_method" value="COD" checked="checked" data-order_button_text="">
												<label>Thanh toán khi nhận hàng </label>
											</span>

											<span >
												<input  type="radio" class="radio-credit" name="payment_method" value="ATM" data-order_button_text="">
												<label >Chuyển khoản </label>
											</span>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" name="submited" class="btn btn-primary">Đặt mua</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</tr>
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
		</tbody>
	</table>

	<?php
	if (isset($_POST['submited'])) {
		$seller = $_POST['nameseller'];
		$product_name = $_POST['product_name'];
		$tongtien = $_POST['price_buy'];
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$note = $_POST['note'];
		$payment = $_POST['payment_method'];
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$order_date = date("Y/m/d H:i:s");
		$order_id = mt_rand(1, 999999);
		$num = 1;
		require_once("connectdb.php");
		while ($num != 0) {
			$sql = "SELECT * FROM order_old_product WHERE order_id = $order_id";
			$result = mysqli_query($connect, $sql);
			$num = mysqli_num_rows($result);
			if ($num == 0) break;
			else $order_id = mt_rand(1, 999999);
		}
		$sql = "INSERT into order_old_product (order_id,seller,product_name,total_money,customer_name,gender,customer_add,customer_phone,order_date,payment,note,status) VALUES
		('".$order_id."','".$seller."','".$product_name."','".$tongtien."','".$name."','".$gender."','".$address."','".$phone."','".$order_date."','".$payment."','".$note."','Đang chờ')";
		$result = mysqli_query($connect,$sql);
		if ($result) {
			//thay đổi trang thái của sản phẩm đã có ng đặt hàng
			$sqlpro = "UPDATE product_user SET notification = 'Đã bán' where product_name = '".$product_name."' and user_email = '".$_SESSION["email"]."'";
			$resultpro = mysqli_query($connect,$sqlpro);
			echo "<script language=\"javascript\">";
			echo "alert('Mua hàng thành công sản phẩm sẽ chuyển đến sau vài ngày');";
			echo "</script>";
		}else {
			echo "<script language=\"javascript\">";
			echo "alert('Mua hàng không thành công lỗi kết nối đến server');";
			echo "</script>";
		}
	}
	?>
	<?php include "../includes/footer.php" ?>