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
