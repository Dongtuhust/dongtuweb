<?php include "../includes/headeradmin.php" ?>

<div class="container" style="display: flex;flex-direction: column;">
	<!-- Quản lý sản phẩm do nhà phân phối cung cấp =========================================-->
	<div class="hover-effect" style="height: 50px">
		<h2 style="text-align: center;">Quản lý tài khoản</h2>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">username</th>
				<th scope="col">email</th>
				<th scope="col">createdate</th>
				<th scope="col">is_block</th>
				<th scope="col">permision</th>
				<th scope="col">address</th>
				<th scope="col">phone</th>
				<th scope="col">block</th>
			</tr>
		</thead>
		<tbody>
			<?php require_once("connectdb.php");
			$sql = "SELECT * FROM users";
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
						<td><?=$row["username"]?></td>
						<td ><?=$row["email"]?></td>
						<td ><?=$row["createdate"]?></td>
						<td style="text-align: center;"><?=$row["is_block"]?></td>
						<td style="text-align: center;"><?=$row["permision"]?></td>
						<td ><?=$row["address"]?></td>
						<td ><?=$row["phone"]?></td>
						<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#ModalCenter<?=$row["user_id"]?>" name="<?=$row["user_id"]?>">Block</button></td>
						<div class="modal fade" id="ModalCenter<?=$row["user_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Bạn muốn khóa tài khoản này</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form method="post">
										<div class="modal-body">
											<p style="color: blue;font-weight: bold;">user_id: </p><input type="text" class="form-control" name="user_id" value="<?=$row["user_id"]?>" readonly="true">
											<p style="color: blue;font-weight: bold;">Tài khoản : </p><input type="text" class="form-control" name="username" value="<?=$row["username"]?>" readonly="true">
											<p style="color: blue;font-weight: bold;">email : </p><input type="text" class="form-control" name="email" value="<?=$row["email"]?>">
											<p style="color: blue;font-weight: bold;">Ngày tạo : </p><input type="text" class="form-control" name="createdate" value="<?=$row["createdate"]?>">
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" name="submited" class="btn btn-primary">Block</button>
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
		$user_id = $_POST["user_id"];
		$sql = "update users set is_block ='1' where user_id='$user_id'";
		$result = mysqli_query($connect,$sql);
		if ($result){
		?>

		<script language="javascript">
			alert('<?php echo "Khóa tài khoản thành công. Nhấn \'OK\' để quay về trang ADMIN." ?>');
		</script>
		<?php
		$url="admin.php";
		echo "<meta http-equiv='refresh' content='0;url=$url' />";
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Khóa tài khoản thất bại." ?>');
		</script>

		<?php
	}
	}
?>
<?php include "../includes/footer.php" ?>