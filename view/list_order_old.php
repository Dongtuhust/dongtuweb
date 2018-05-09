<div class="hover-effect" style="height: 50px">
	<h2 style="text-align: center;">Quản lý đơn hàng đĩa cũ</h2>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Mã Đơn hàng</th>
			<th scope="col">Người bán</th>
			<th scope="col">Mặt hàng</th>
			<th scope="col">Tổng tiền</th>
			<th scope="col">Tên khách hàng</th>
			<th scope="col">Giới tính</th>
			<th scope="col">Địa chỉ</th>
			<th scope="col">Số điện thoại</th>
			<th scope="col">Ngày mua hàng</th>
			<th scope="col">Dạng thanh toán</th>
			<th scope="col">Ghi chú</th>
			<th scope="col">Trạng thái</th>
			<th scope="col">Chi tiết</th>
		</tr>
	</thead>
	<tbody>
		<?php require_once("connectdb.php");
		$sql = "SELECT * FROM order_old_product";
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
					<th scope="row"><?=$row["order_id"]?></th>
					<td><?=$row["seller"]?></td>
					<td><?=$row["product_name"]?></td>
					<td style="text-align: center;"><?=$row["total_money"]?></td>
					<td><?=$row["customer_name"]?></td>
					<td><?=$row["gender"]?></td>
					<td ><?=$row["customer_add"]?></td>
					<td style="text-align: center;"><?=$row["customer_phone"]?></td>
					<td style="text-align: center;"><?=$row["order_date"]?></td>
					<td style="text-align: center;"><?=$row["payment"]?></td>
					<td ><textarea class="form-control" rows="1"><?=$row["note"]?></textarea></td>
					<td style="text-align: center;"><?=$row["status"]?></td>
					<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#ModalCenter<?=$row["order_id"]?>" name="<?=$row["order_id"]?>">Details</button></td>
					<div class="modal fade" id="ModalCenter<?=$row["order_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng 
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button"  class="btn btn-primary oldorder" data-oldorder="<?=$row["order_id"]?>">Xác nhận giao hàng</button>
											<button type="button"  class="btn btn-waring deloldorder"data-deloldorder="<?=$row["order_id"]?>">Hủy đơn hàng</button>
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