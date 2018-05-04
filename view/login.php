<?php include "../includes/header.php" ?>
<?php require_once("connectdb.php"); ?>
<div class="sign-in">
	<div class="row">
		<div class="col-sm-8">
			<h2>Đăng nhập</h2>
			<form action="login.php" method="post">
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
				<fieldset class="form-group">

				</fieldset>
				<div class="form-group row">
					<div class="col-sm-2">Remember password</div>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" ">
							<label class="form-check-label" >
								Remember
							</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" name="btn_submit" class="btn btn-primary">Login</button>
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
	$email = strip_tags($email);
	$email = addslashes($email);
	$password = strip_tags($password);
	$password = addslashes($password);
	if ($email == "" || $password =="") {
		echo '<script language="javascript">';
		echo 'alert("bạn vui lòng nhập đầy đủ thông tin")';
		echo '</script>';
	}else{
		$sql ="select * from users where email='$email' and password='$password'";
		$query = mysqli_query($connect,$sql);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows==0) {
			echo '<script language="javascript">';
			echo 'alert("Tài khoản mật khẩu không đúng yêu cầu nhập lại")';
			echo '</script>';
		}else{
			while ( $data = mysqli_fetch_array($query) ){
				$_SESSION["user_id"] = $data["user_id"];
				$_SESSION["email"] = $data["email"];
				$_SESSION["username"] = $data["username"];
				$_SESSION["is_block"] = $data["is_block"];
				$_SESSION["permision"] = $data["permision"];
			}
			if ($_SESSION["is_block"]=="1") {
				echo '<script language="javascript">';
				echo 'alert("Tài khoản của bạn đã bị khóa vui lòng liên hệ nhà quản trị để dược cấp lại")';
				echo '</script>';
			}else{
				unset($_SESSION['cart']);
				echo '<script language="javascript">';
				echo 'alert("Đăng nhập thành công")';
				echo '</script>';
				if ($_SESSION['permision'] == "1") {
					$url="admin.php";
				}
				else{ $url="index.php";}
				echo "<meta http-equiv='refresh' content='0;url=$url' />";
			}
		}
	}
}
?>