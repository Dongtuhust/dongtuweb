<?php include "../includes/headeradmin.php" ?>
<script>
	function newproduct(){
		$.ajax({
			url: 'list_order_new.php',
			type: 'post',
			dataType: 'text',
			data: {},
			success : function(result){
				$('#order_list').html(result);
			}
		});
	}
	function oldproduct(){
		$.ajax({
			url: 'list_order_old.php',
			type: 'post',
			dataType: 'text',
			data: {},
			success : function(result){
				$('#order_list').html(result);
			}
		});
	}
</script>
<div class="container" style="display: flex;flex-direction: column;">
	<!-- Quản lý đơn hàng  ========================================================-->
	<div class="tab">
		<button type="button" id="" class="btn btn-success" onclick="newproduct()">Đĩa mới</button>
		<button type="submit" id="" class="btn btn-primary" onclick="oldproduct()">Đĩa cũ</button>
	</div>
	<!-- Quản lý sản phẩm  ========================================================-->
	<div id="order_list">
		<div class="hover-effect" style="height: 50px">
			<h2 style="text-align: center;">Quản lý đơn hàng</h2>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Mã Đơn hàng</th>
					<th scope="col">Tên khách hàng</th>
					<th scope="col">Địa chỉ</th>
					<th scope="col">Số điện thoại</th>
					<th scope="col">Tổng tiền</th>
					<th scope="col">Dạng thanh toán</th>
					<th scope="col">Ngày mua hàng</th>
					<th scope="col">Ghi chú</th>
					<th scope="col">Trạng thái</th>
					<th scope="col">Chi tiết</th>
				</tr>
			</thead>
			<tbody>
				<?php require_once("connectdb.php");
				$sql = "SELECT * FROM order_customer";
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
							<td><?=$row["customer_name"]?></td>
							<td ><?=$row["customer_add"]?></td>
							<td style="text-align: center;"><?=$row["customer_phone"]?></td>
							<td style="text-align: center;"><?=$row["total_money"]?></td>
							<td style="text-align: center;"><?=$row["payment"]?></td>
							<td style="text-align: center;"><?=$row["order_date"]?></td>
							<td ><textarea class="form-control" rows="1"><?=$row["note"]?></textarea></td>
							<td style="text-align: center;"><?=$row["status"]?></td>
							<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#ModalCenter<?=$row["order_id"]?>" name="<?=$row["order_id"]?>">Details</button></td>
							<div class="modal fade" id="ModalCenter<?=$row["order_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<form method="post">
												<h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng 
													<input type="text" name="order_id" value="<?=$row["order_id"]?>" readonly class="form-control"></h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<?php
													$sql_order = "SELECT * from order_product where order_id = '".$row['order_id']."'";
													$result_order = mysqli_query($connect,$sql_order);
													$totaldata = mysqli_num_rows($result_order);
													if($totaldata>0){
														$i=0;
			// Sử dụng vòng lặp để duyệt kết quả truy vấn
														while ($data= mysqli_fetch_array ($result_order))
														{
															$i+=1;
															?>
															<div style="line-height: 1.5;">
																<p>Tên sản phẩm : <span style="color: orange;"><?=$data["product_name"]?></span></p>
																<p>Số lượng : <span style="color: orange;"><?=$data["quantity"]?></span></p>
															</div>
															<hr width="80%" align="center" />
															<?php
														}
													}else{
														?>
														<tr valign="top">
															<td >&nbsp;</td>
															<td ><b><font face="Arial" color="#FF0000">
															Khong tim thay thong tin đơn hàng!</font></b></td>
														</tr>
														<?php
													}
													?>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" name="submited" class="btn btn-primary">Xác nhận giao hàng</button>
													<button type="submit" name="submited_1" class="btn btn-waring">Hủy đơn hàng</button>
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
		$order_id = $_POST['order_id'];
		$sql = "UPDATE order_customer SET status='Đã giao' where order_id= $order_id";
		$result = mysqli_query($connect,$sql);
	}
	if (isset($_POST["submited_1"])) {
		$order_id = $_POST['order_id'];
		$sql = "UPDATE order_customer SET status='Bị hủy' where order_id= $order_id";
		$result = mysqli_query($connect,$sql);
	}
	if (isset($_POST["submited_2"])) {
		$order_id = $_POST['order_id'];
		$sql = "UPDATE order_old_product SET status='Đã giao' where order_id= $order_id";
		$result = mysqli_query($connect,$sql);
	}
	?>
	<?php include "../includes/footer.php" ?>