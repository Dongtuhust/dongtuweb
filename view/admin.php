<<<<<<< HEAD
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
</script>
=======
<?php
	include "../includes/headeradmin.php";
	require_once("pagination.php");
	$recordPerPage = 10;
?>

<link rel="stylesheet" type="text/css" href="../css/w3s.css"/>

>>>>>>> 26fd3b1166682dfac06a3720107c2bc11e9548cc
<div class="container" style="display: flex;flex-direction: column;">
	<div class="tab">
		<button type="button" id="distributionBtn" class="btn btn-success">Nhà phân phối</button>
		<button type="submit" id="userBtn" class="btn btn-primary">Người dùng</button>
	</div>
	<!-- Quản lý sản phẩm  ========================================================-->
	<div id="product_list">

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
if (isset($_POST["submited_2"])) {
	$product_id = $_POST["product_id"];
	$product_name = $_POST["product_name"];
	$price_buy = $_POST["price_buy"];
	$price_rent = $_POST["price_rent"];
	$description = $_POST["description"];
	$category_id = $_POST["category_id"];
	$status = $_POST["status"];
	$user_email = $_POST["user_email"];
	$sqlupdate="update product_user set product_name='$product_name',price_buy='$price_buy',
	price_rent='$price_rent',description='$description',category='$category',status='$status',user_email='$user_email' Where product_id='$product_id'";
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

<script>
	var page = 1;
	var mode = "distributor";
	distributor();

	function distributor(){
		$.ajax({
			url: 'product.php?page=' + page,
			type: 'get',
			dataType: 'text',
			data: {},
			success : function(result){
				$('#product_list').html(result);
			}
		});
	}

	function user(){
		$.ajax({
			url: 'product_user.php?page=' + page,
			type: 'post',
			dataType: 'text',
			data: {},
			success : function(result){
				$('#product_list').html(result);
			}
		});
	}

	function changePage(src){
		var pageNumber = src.getAttribute("page");
		if(pageNumber != page){
			page = pageNumber;
			if(mode == "distributor"){
				distributor();
			}else{
				user();
			}
		}
	}

	document.getElementById("distributionBtn").onclick = function(){
		if(mode != "distributor"){
			page = 1;
			distributor();
			mode = "distributor";
		}
	}

	document.getElementById("userBtn").onclick = function(){
		if(mode != "user"){
			page = 1;
			user();
			mode = "user";
		}
	}
</script>