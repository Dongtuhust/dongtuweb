<?php
	include "../includes/headeradmin.php";
	require_once("pagination.php");
	$recordPerPage = 10;
?>

<div class="hover-effect" style="height: 50px">
	<h2 style="text-align: center;">Quản lý sản phẩm do người dùng đăng bán</h2>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Email</th>
			<th scope="col">Id</th>
			<th scope="col">Tên sản phẩm</th>
			<th scope="col">Giá mua</th>
			<th scope="col">Giá thuê</th>
			<th scope="col">Miêu tả</th>
			<th scope="col">Thể loại</th>
			<th scope="col">Trạng thái</th>
			<th scope="col">Xóa</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql = "SELECT * FROM product_user"; 
			$totalProduct = executeQuery($sql);
			$page = getPage();
			$products = getPageProductUserSell($totalProduct, $recordPerPage, $page);

			if(count($products) > 0){
				$i = 0;
				// Sử dụng vòng lặp để duyệt kết quả truy vấn
				while ($i < count($products))
				{
					$row = $products[$i];
					$i+=1;
					?>
				<tr valign="top">
					<th scope="row" style="text-align: center;"><?=$row["user_email"]?></td>
					<td><?=$row["product_id"]?></th>
					<td><?=$row["product_name"]?></td>
					<td ><?=$row["price_buy"]?></td>
					<td ><?=$row["price_rent"]?></td>
					<td ><textarea class="form-control" rows="1"><?=$row["description"]?></textarea></td>
					<td style="text-align: center;"><?=$row["category"]?></td>
					<td style="text-align: center;"><?=$row["status"]?></td>

					<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#product_user<?=$row["product_id"]?>" name="<?=$row["product_id"]?>">Xóa</button></td>
					<div class="modal fade" id="product_user<?=$row["product_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
										<p>user_email : </p><input type="text" class="form-control" name="user_email" value="<?=$row["user_email"]?>">
										<p>product_id : </p><input type="text" class="form-control" name="product_id" value="<?=$row["product_id"]?>" readonly="true">
										<p>product_name : </p><input type="text" class="form-control" name="product_name" value="<?=$row["product_name"]?>">
										<p>price_buy : </p><input type="text" class="form-control" name="price_buy" value="<?=$row["price_buy"]?>">
										<p>price_rent: </p><input type="text" class="form-control" name="price_rent" value="<?=$row["price_rent"]?>">
										<p>description : </p><input type="text" class="form-control" name="description" value="<?=$row["description"]?>">
										<p>category : </p><input type="text" class="form-control" name="category" value="<?=$row["category"]?>">
										<p>status : </p><input type="text" class="form-control" name="status" value="<?=$row["status"]?>">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" name="submited_2" class="btn btn-primary">Save changes</button>
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
<?php echo getPaginationUnhref(count($totalProduct), $recordPerPage); ?>