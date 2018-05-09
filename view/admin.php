<?php include "../includes/headeradmin.php" ?>
<script>
	function distributor(){
		$.ajax({
			url: 'product.php',
			type: 'post',
			dataType: 'text',
			data: {},
			success : function(result){
				$('#product_list').html(result);
			}
		});
	}
	function user(){
		$.ajax({
			url: 'product_user.php',
			type: 'post',
			dataType: 'text',
			data: {},
			success : function(result){
				$('#product_list').html(result);
			}
		});
	}
	$(document).on('click', '.delproduct', function() {
		var iddelete = $(this).attr("data-delproduct");
		$.ajax({
			url: 'handling-product.php',
			type: 'post',
			dataType: 'text',
			data: { iddelete : iddelete },
			success : function(result){
				$("#handling-product").html(result);
				location.reload();
			}
		});
	});
</script>
<div class="container" style="display: flex;flex-direction: column;">
	<div class="tab">
		<button type="button" id="" class="btn btn-success" onclick="distributor()">Nhà phân phối</button>
		<button type="submit" id="" class="btn btn-primary" onclick="user()">Người dùng</button>
	</div>
	<!-- Quản lý sản phẩm  ========================================================-->
	<div id="handling-product">
		
	</div>
	<div id="product_list">
		<div class="hover-effect" style="height: 50px">
			<h2 style="text-align: center;">Quản lý sản phẩm do nhà phân phối cung cấp</h2>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Tên sản phẩm</th>
					<th scope="col">Giá</th>
					<th scope="col">Miêu tả</th>
					<th scope="col">Thể loại</th>
					<th scope="col">Số lượng</th>
					<th scope="col">Nhà cung cấp</th>
					<th scope="col">Trạng thái</th>
					<th scope="col">Sửa</th>
				</tr>
			</thead>
			<tbody>
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
						?>
						<tr valign="top">
							<th scope="row"><?=$row["product_id"]?></th>
							<td><?=$row["product_name"]?></td>
							<td ><?=$row["price_buy"]?></td>
							<td ><textarea class="form-control" rows="1"><?=$row["description"]?></textarea></td>
							<td style="text-align: center;"><?=$row["category_id"]?></td>
							<td style="text-align: center;"><?=$row["quantity"]?></td>
							<td style="text-align: center;"><?=$row["distributor_name"]?></td>
							<td style="text-align: center;"><?=$row["product_status"]?></td>
							<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#ModalCenter<?=$row["product_id"]?>" name="<?=$row["product_id"]?>">Sửa</button></td>
							<div class="modal fade" id="ModalCenter<?=$row["product_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa dữ liệu sản phẩm</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post">
											<div class="modal-body">
												<p>product_id : </p><input type="text" class="form-control" name="product_id" value="<?=$row["product_id"]?>" readonly="true">
												<p>product_name : </p><input type="text" class="form-control" name="product_name" value="<?=$row["product_name"]?>">
												<p>price_buy : </p><input type="text" class="form-control" name="price_buy" value="<?=$row["price_buy"]?>">
												<p>description : </p><input type="text" class="form-control" name="description" value="<?=$row["description"]?>">
												<p>category_id : </p><input type="text" class="form-control" name="category_id" value="<?=$row["category_id"]?>">
												<p>quantity : </p><input type="text" class="form-control" name="quantity" value="<?=$row["quantity"]?>">
												<p>distributor_name : </p><input type="text" class="form-control" name="distributor_name" value="<?=$row["distributor_name"]?>">
												<p>
												product_status : </p><select  class="form-control" name="product_status" value="<?=$row["product_status"]?>">
													<option value="Mới">Mới</option>
													<option value="Cũ">Cũ</option>
													<option value="Hot">Hot</option>
													<option value="Quá cũ">Quá cũ</option>
												</select>

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
</div>
<!-- Modal -->
<?php
if (isset($_POST["submited"])) {
	$product_id = $_POST["product_id"];
	$product_name = $_POST["product_name"];
	$price_buy = $_POST["price_buy"];
	$description = $_POST["description"];
	$category_id = $_POST["category_id"];
	$quantity = $_POST["quantity"];
	$distributor_name = $_POST["distributor_name"];
	$product_status = $_POST["product_status"];
	$sqlupdate="update product set product_name='$product_name',price_buy='$price_buy',description='$description',category_id='$category_id',quantity='$quantity',distributor_name='$distributor_name',product_status='$product_status' Where product_id='$product_id'";
	$resultupdate = mysqli_query($connect, $sqlupdate);
	if ($resultupdate){
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thành công. Nhấn \'OK\' để quay về trang ADMIN." ?>');
		</script>

		<?php 
		$url="admin.php";
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