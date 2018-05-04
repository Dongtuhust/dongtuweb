<?php include "../includes/header.php" ?>
<?php require_once("connectdb.php"); ?>
<div class="sign-in">
	<div class="row">
		<div class="col-sm-8">
			<h2>Đổi mật khẩu</h2>
			<form  method="post">
				<div class="form-group row">
					<label  class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" placeholder="Email" required="">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="password"  placeholder="Password" required="">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-2 col-form-label">New password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="newpassword"  placeholder="Password" required="">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-2 col-form-label">Re-enter</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="repassword"  placeholder="Re-enter Password" required="">
					</div>
				</div>
				<fieldset class="form-group">

				</fieldset>
				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" name="btn_submit" class="btn btn-primary">Change</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-4">
			<img src="../image/ps4.jpg" alt="">
		</div>
	</div>
</div>
<?php include "../includes/footer.php" ?>
<?php 
if (isset($_POST["btn_submit"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$newpassword = $_POST["newpassword"];
	$repassword = $_POST["repassword"];

	if ($newpassword !=$repassword) {
		echo '<script language="javascript">';
		echo 'alert("Mật khẩu xác nhận không khớp")';
		echo '</script>';
	}else{
		$sql ="UPDATE users SET password='".$newpassword."' where email='$email' and password='$password'";
		$query = mysqli_query($connect,$sql);
		if (!$query) {
			echo '<script language="javascript">';
			echo 'alert("Tài khoản mật khẩu không đúng yêu cầu nhập lại")';
			echo '</script>';
		}else{
			unset($_SESSION['cart']);
			echo '<script language="javascript">';
			echo 'alert("Đổi mật khẩu thành công đăng nhập lại để xác nhận")';
			echo '</script>';
			$url="login.php";
			echo "<meta http-equiv='refresh' content='0;url=$url' />";
		}
	}
}

?>