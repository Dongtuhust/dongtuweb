<?php include "../includes/header.php" ?>
<?php
$id = $_GET["id"];
?>
<div class="hover-effect" style="height: 50px">
	<h2 style="text-align: center;">Quản lý sản phẩm do người dùng đăng bán</h2>
</div>
<div class="sign-in">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">Ảnh</th>
				<th scope="col">Tên sản phẩm</th>
				<th scope="col">Giá mua</th>
				<th scope="col">Giá thuê</th>
				<th scope="col">Miêu tả</th>
				<th scope="col">Thể loại</th>
				<th scope="col">Tình trạng</th>
				<th scope="col">Thông báo</th>
				<th scope="col">Thay đổi</th>
			</tr>
		</thead>
		<tbody>
			<?php require_once("connectdb.php");
			$sqlu = "SELECT * FROM product_user,users where product_user.user_email = users.email and user_id = '".$id."'";
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
						<td><span><img style="width: 70px;height: 50px;" class="card-img-top" src="<?=$row["product_img"]?>" alt="Card image"></span></td>
						<td><?=$row["product_name"]?></td>
						<td ><?=$row["price_buy"]?></td>
						<td ><?=$row["price_rent"]?></td>
						<td ><textarea class="form-control" rows="1"><?=$row["description"]?></textarea></td>
						<td style="text-align: center;"><?=$row["category"]?></td>
						<td style="text-align: center;"><?=$row["status"]?></td>
						<td style="text-align: center;"><?=$row["notification"]?></td>
						<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#product_user<?=$row["product_id"]?>" name="<?=$row["product_id"]?>">Sửa</button></td>
						<div class="modal fade" id="product_user<?=$row["product_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Chi tiết sản phẩm</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form method="post">
										<div class="modal-body">
											<p>user_email : </p><input type="text" class="form-control" name="user_email" value="<?=$row["user_email"]?>" readonly>
											<p>product_name : </p><input type="text" class="form-control" name="product_name" value="<?=$row["product_name"]?>" readonly>
											<p>price_buy : </p><input type="text" class="form-control" name="price_buy" value="<?=$row["price_buy"]?>">
											<p>price_rent: </p><input type="text" class="form-control" name="price_rent" value="<?=$row["price_rent"]?>">
											<p>description : </p><input type="text" class="form-control" name="description" value="<?=$row["description"]?>">
											<p>category : </p><input type="text" class="form-control" name="category" value="<?=$row["category"]?>">
											<p>status : </p><input type="text" class="form-control" name="status" value="<?=$row["status"]?>">
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" name="submited" class="btn btn-primary">Save changes</button>
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
</div>
<?php 
if (isset($_POST["submited"])) {
	$user_email = $_POST["user_email"];
	$product_name = $_POST["product_name"];
	$price_buy = $_POST["price_buy"];
	$price_rent = $_POST["price_rent"];
	$description = $_POST["description"];
	$category = $_POST["category"];
	$status = $_POST["status"];
	$sqlupdate="update product_user set product_name='$product_name',price_buy='$price_buy',price_rent='$price_rent',description='$description',category='$category',status='$status' Where user_email='$user_email' and product_name = '$product_name' " ;
	$resultupdate = mysqli_query($connect, $sqlupdate);
	if ($resultupdate){
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thành công." ?>');
		</script>

		<?php 
		$url="myproduct.php?id=$id";
		echo "<meta http-equiv='refresh' content='0;url=$url' />";
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
?>
<?php include "../includes/footer.php" ?>