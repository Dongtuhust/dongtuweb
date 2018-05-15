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
			<th scope="col">Tình trạng</th>
			<th scope="col">Trạng thái</th>
			<th scope="col">Xóa sản phẩm</th>
		</tr>
	</thead>
	<tbody>
		<?php require_once("connectdb.php");
		if (isset($_POST["input_search"])) {
			$sqlu = "SELECT * FROM product_user where user_email LIKE '%".$_POST["input_search"]."%'";
		}else{
			$sqlu = "SELECT * FROM product_user";
		}
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
					<th scope="row" style="text-align: center;"><?=$row["user_email"]?></td>
						<td><?=$row["product_id"]?></th>
							<td><?=$row["product_name"]?></td>
							<td ><?=$row["price_buy"]?></td>
							<td ><?=$row["price_rent"]?></td>
							<td ><textarea class="form-control" rows="1"><?=$row["description"]?></textarea></td>
							<td style="text-align: center;"><?=$row["category"]?></td>
							<td style="text-align: center;"><?=$row["status"]?></td>
							<td style="text-align: center;"><?=$row["notification"]?></td>
							<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#product_user<?=$row["product_id"]?>" name="<?=$row["product_id"]?>">Xóa sản phẩm</button></td>
							<div class="modal fade" id="product_user<?=$row["product_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa dữ liệu sản phẩm</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
											<div class="modal-body">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary delproduct" data-delproduct="<?=$row["product_id"]?>">Xóa sản phẩm</button>
											</div>
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