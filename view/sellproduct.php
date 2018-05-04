<?php include "../includes/header.php" ?>
<?php
$email = $_GET["email"];
require_once("connectdb.php"); 
?>
<div class="sign-in">
	<div class="row">
		<div class="col-sm-8">
			<h2>Đăng bán sản phẩm của bạn</h2>
			<form  method="post" enctype="multipart/form-data">
				<div class="form-group row">
					<label  class="col-sm-4 col-form-label">Tên sản phẩm*</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="name"  required="">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-4 col-form-label">Giá bán</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="buy"  placeholder="" required="">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-4 col-form-label">Giá thuê</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="rent"  required="">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-4 col-form-label">Mô tả</label>
					<div class="col-sm-6">
						<textarea type="text" class="form-control" name="description" required=""></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-4 col-form-label">Thể loại</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="category"  required="">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-4 col-form-label">Tình trạng</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="status"  placeholder="%" required="">
					</div>
				</div>
				<div class="form-group row" style="margin-bottom: 40px;">
					<label class="col-sm-4 col-form-label" style="color: orange;">Ảnh minh họa</label>
					<div class="col-sm-6">
						
						<div class="custom-file">
							<input type="file"  class="custom-file-input" name="imgfile">
							<label class="custom-file-label">Choose file</label>
						</div>
					</div>
				</div>
				<fieldset class="form-group">

				</fieldset>
				<div class="form-group row">
					<div class="col-sm-6">
						<button type="submit" name="btn_submit" class="btn btn-primary">Đăng bán</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-4">
			<img src="../image/ps4.jpg" alt="">
		</div>
	</div>
</div>
<?php include "../includes/footer.php" ?>
<?php 

if (isset($_POST["btn_submit"])){
	$product_name = $_POST["name"];
	$buy = $_POST["buy"];
	$rent = $_POST["rent"];
	$description = $_POST["description"];
	$category= $_POST["category"];
	$status = $_POST["status"];
	$imgfile = $_FILES["imgfile"];
	require_once("connectdb.php");
	$sql = "INSERT INTO `product_user` (`product_id`, `product_name`, `price_buy`,`price_rent`, `description`, `product_img`, `category`, `user_email`, `status`)
	VALUES (NULL, '$product_name', '$buy','$rent', '$description','NULL','$category', '$email', '$status')";
	$result = mysqli_query($connect,$sql);
	if (isset($_FILES["imgfile"])) {
		if ($_FILES["imgfile"]["error"]) {
			echo "File bị lỗi";
		}else{
			move_uploaded_file($_FILES['imgfile']['tmp_name'], '../image/product_user/'.$_FILES['imgfile']['name']);
		}

	}
	$sqlimg = "UPDATE `product_user` SET `product_img`='../image/product_user/".$_FILES['imgfile']['name']."' WHERE product_name='$product_name'";
	$resultimg = mysqli_query($connect,$sqlimg);
	if ($result){
		?>

		<script language="javascript">
			alert('<?php echo "Thêm dữ liệu thành công. Nhấn \'OK\' để quay về trang chính." ?>');
		</script>

		<?php
		$url="user_sell.php";
		echo "<meta http-equiv='refresh' content='0;url=$url' />";
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Thêm dữ liệu thất bại." ?>');
		</script>

		<?php
	}

}
?>