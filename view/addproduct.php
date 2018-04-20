<?php include "../includes/headeradmin.php" ?>
<div class="background-deep admin">

</div>
<div class = "head-title">
	<p>Managenment</p>
</div>
<div class="container" style="display: flex;flex-direction: column;">
	<!-- Quản lý sản phẩm do nhà phân phối cung cấp =========================================-->
	<div class="hover-effect" style="height: 50px">
		<h2 style="text-align: center;">Thêm sản phẩm</h2>
	</div>
	<h3 style="margin-bottom: 20px;color: #66afda;">Thông tin</h3>
	<form style="margin: 20px 130px 0px 130px;" method="post" enctype="multipart/form-data">
		<div class="form-group row" style="margin-bottom: 40px;">
			<label class="col-sm-4 col-form-label" style="color: blue;">Tên sản phẩm*</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="product_name">
			</div>
		</div>
		<div class="form-group row" style="margin-bottom: 40px;">
			<label class="col-sm-4 col-form-label" style="color: blue;">Giá*</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="price_buy">
			</div>
		</div>
		<div class="form-group row" style="margin-bottom: 40px;">
			<label class="col-sm-4 col-form-label" style="color: blue;">Miêu tả*</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="description">
			</div>
		</div>
		<div class="form-group row" style="margin-bottom: 40px;">
			<label class="col-sm-4 col-form-label" style="color: blue;">Thể loại</label>
			<div class="col-sm-4">
				<select  class="form-control" name="category_name">
					<option selected>Choose...</option>
					<option value="Bắn súng">Bắn súng</option>
					<option value="Nhập vai">Nhập vai</option>
					<option value="Đối kháng">Đối kháng</option>
					<option value="Thể thao">Thể thao</option>
					<option value="Kinh dị">Kinh dị</option>
				</select>
			</div>
		</div>
		<div class="form-group row" style="margin-bottom: 40px;">
			<label class="col-sm-4 col-form-label" style="color: blue;">Nhà phân phối</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="distributor">
			</div>
		</div>
		<div class="form-group row" style="margin-bottom: 40px;">
			<label class="col-sm-4 col-form-label" style="color: blue;">Số lượng</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="quantity">
			</div>
		</div>
		<div class="form-group row" style="margin-bottom: 40px;">
			<label class="col-sm-4 col-form-label" style="color: blue;">Ảnh</label>
			<div class="col-sm-8">
				<input type="file" name="imgfile">
				<!-- <label class="custom-file-label" for="customFile">Lựa chọn ảnh</label> -->
			</div>
		</div>
		<button class="btn btn-primary" type="submit" name="submited" style="float: right;">Thêm</button>
	</form>
	<?php 
	
	if (isset($_POST["submited"])){
		$product_name = $_POST["product_name"];
		$price_buy = $_POST["price_buy"];
		$description = $_POST["description"];
		$category_name = $_POST["category_name"];
		$quantity = $_POST["quantity"];
		$distributor = $_POST["distributor"];
		$imgfile = $_FILES["imgfile"];
		require_once("connectdb.php");
		$sql = "INSERT INTO `product` (`product_id`, `product_name`, `price_buy`, `description`, `product_image`, `category_id`, `distributor_name`, `quantity`)
		VALUES (NULL, '$product_name', '$price_buy', '$description','NULL','1', '$distributor', '$quantity')";
		$result = mysqli_query($connect,$sql);
		$id=0;
		switch ($category_name) {
			case 'Bắn súng':
			$id=1;
			break;
			case 'Nhập vai':
			$id=4;
			break;
			case 'Đối kháng':
			$id=3;
			break;
			case 'Thể thao':
			$id=2;
			break;
			case 'Kinh dị':
			$id=5;
			break;
			default:
			$id=0;
			break;
		}
		$sqlcategory = "update product set category_id='$id' where product_name='$product_name'";
		$resultcategory = mysqli_query($connect,$sqlcategory);
		if (isset($_FILES["imgfile"])) {
			if ($_FILES["imgfile"]["error"]) {
				echo "File bị lỗi";
			}else{
				move_uploaded_file($_FILES['imgfile']['tmp_name'], '../image/'.$_FILES['imgfile']['name']);
			}

		}
		$sqlimg = "UPDATE `product` SET `product_image`='../image/".$_FILES['imgfile']['name']."' WHERE product_name='$product_name'";
		$resultimg = mysqli_query($connect,$sqlimg);
		if ($result){
			?>

			<script language="javascript">
				alert('<?php echo "Thêm dữ liệu thành công. Nhấn \'OK\' để quay về trang ADMIN." ?>');
			</script>

			<?php
			$url="admin.php";
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
	<?php include "../includes/footer.php" ?>