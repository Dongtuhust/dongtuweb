<div class="hover-effect" style="height: 50px">
	<h2 style="text-align: center;">Quản lý sản phẩm do người dùng đăng bán</h2>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Id</th>
			<th scope="col">Tên sản phẩm</th>
			<th scope="col">Giá mua</th>
			<th scope="col">Giá thuê</th>
			<th scope="col">Miêu tả</th>
			<th scope="col">Thể loại</th>
			<th scope="col">Số lượng</th>
			<th scope="col">Email</th>
			<th scope="col">Sửa</th>
		</tr>
	</thead>
	<tbody>
		<?php require_once("connectdb.php");
		$sqlu = "SELECT * FROM product_user";
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
					<th scope="row"><?=$row["product_id"]?></th>
					<td><?=$row["product_name"]?></td>
					<td ><?=$row["price_buy"]?></td>
					<td ><?=$row["price_rent"]?></td>
					<td ><textarea class="form-control" rows="1"><?=$row["description"]?></textarea></td>
					<td style="text-align: center;"><?=$row["category_id"]?></td>
					<td style="text-align: center;"><?=$row["quantity"]?></td>
					<td style="text-align: center;"><?=$row["user_email"]?></td>
					<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#product_user<?=$row["product_id"]?>" name="<?=$row["product_id"]?>">Sửa</button></td>
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
										<p>product_id : </p><input type="text" class="form-control" name="product_id" value="<?=$row["product_id"]?>" readonly="true">
										<p>product_name : </p><input type="text" class="form-control" name="product_name" value="<?=$row["product_name"]?>">
										<p>price_buy : </p><input type="text" class="form-control" name="price_buy" value="<?=$row["price_buy"]?>">
										<p>price_rent: </p><input type="text" class="form-control" name="price_rent" value="<?=$row["price_rent"]?>">
										<p>description : </p><input type="text" class="form-control" name="description" value="<?=$row["description"]?>">
										<p>category_id : </p><input type="text" class="form-control" name="category_id" value="<?=$row["category_id"]?>">
										<p>quantity : </p><input type="text" class="form-control" name="quantity" value="<?=$row["quantity"]?>">
										<p>user_email : </p><input type="text" class="form-control" name="user_email" value="<?=$row["user_email"]?>">
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