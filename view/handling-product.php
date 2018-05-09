<?php
require_once("connectdb.php");
if (isset($_POST["iddelete"])) {
	$product_id = $_POST["iddelete"];
	$sqldelete="delete from product_user Where product_id='$product_id'";
	$resultdelete = mysqli_query($connect, $sqldelete);
	if ($resultdelete){
		?>

		<script language="javascript">
			alert('<?php echo "Xóa dữ liệu thành công. Nhấn \'OK\' để quay về trang ADMIN." ?>');
		</script>

		<?php 
		$url="admin.php";
		echo "<meta http-equiv='refresh' content='0;url=$url' />";
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Xóa dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
?>