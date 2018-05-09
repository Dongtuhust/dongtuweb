<script src="../js/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<?php
require_once("connectdb.php");
if (isset($_POST["neworder"])) {
	$order_id = $_POST['neworder'];
	$sql = "UPDATE order_customer SET status='Đã giao' where order_id= $order_id";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		?>
		<script language="javascript">
			alert('<?php echo "Cập nhật thành công. Nhấn \'OK\' để hoàn tất" ?>');
		</script>
		<?php
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
if (isset($_POST["delneworder"])) {
	$order_id = $_POST['delneworder'];
	$sql = "UPDATE order_customer SET status='Bị hủy' where order_id= $order_id";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		?>

		<script language="javascript">
			alert('<?php echo "Hủy đơn hàng thành công. Nhấn \'OK\' để hoàn tất" ?>');
		</script>

		<?php
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
if (isset($_POST["oldorder"])) {
	$order_id = $_POST['oldorder'];
	$sql = "UPDATE order_old_product SET status='Đã giao' where order_id= $order_id";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật thành công. Nhấn \'OK\' để hoàn tất" ?>');
		</script>

		<?php
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
if (isset($_POST["deloldorder"])) {
	$order_id = $_POST['deloldorder'];
	$sql = "UPDATE order_old_product SET status='Bị hủy' where order_id= $order_id";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		?>

		<script language="javascript">
			alert('<?php echo "Hủy đơn hàng thành công. Nhấn \'OK\' để hoàn tất" ?>');
		</script>

		<?php 
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
?>