<?php include "../includes/header.php" ?>
<?php require_once("connectdb.php"); ?>
<div class="sign-in">
	<div class="header">
		<h1>Đăng ký</h1>
	</div>
	<form action="signup.php" method="post">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputEmail4">Email</label>
				<input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email">
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress">Tên đăng nhập</label>
				<input type="text" class="form-control" name="username" id="inputAddress" placeholder="username">

			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword4">Password</label>
			<input type="password" class="form-control" name="password1" id="inputPassword4" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="inputPassword4">Xác nhận Password</label>
			<input type="password" class="form-control" name="password2" id="inputPassword4" placeholder="Password">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputCity">Thành phố</label>
				<input type="text" class="form-control" name="city" id="inputCity">
			</div>
			<div class="form-group col-md-2">
				<label for="inputZip">Số điện thoại</label>
				<input type="text" class="form-control" name="phone" id="inputZip">
			</div>
			<div class="form-group col-md-4">
				<label for="inputZip">passAdmin</label>
				<input type="text" class="form-control" name="passAdmin" id="inputZip" placeholder="Không bắt buộc">
			</div>
		</div>
		<div class="form-group">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="gridCheck">
				<label class="form-check-label" for="gridCheck">
					Check me out
				</label>
			</div>
		</div>
		<button type="submit" name="btn_submit" class="btn btn-primary">Sign in</button>
	</form>
</div>
<?php include "../includes/footer.php" ?>
<?php 
if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
	$username = $_POST["username"];
	$password1 = $_POST["password1"];
	$password2 = $_POST["password2"];
	$city = $_POST["city"];
	$street = $_POST["street"];
	$phone= $_POST["phone"];
	$email = $_POST["email"];
	$passAdmin = $_POST["passAdmin"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
	if ($password1!=$password2) {
		echo '<script language="javascript">';
		echo 'alert("Yêu cầu xác nhận lại password")';
		echo '</script>';
	}
	else{
		if ($username == "" || $password1 == "" ||$password2 == "" || $city == "" || $email == ""||$phone== "") {
			echo '<script language="javascript">';
			echo 'alert("bạn vui lòng nhập đầy đủ thông tin")';
			echo '</script>';
		}else{
			if ($passAdmin=="") {
				$sql = "INSERT INTO users(username, password, address, email, createdate,phone,permision) VALUES ( '$username', '$password1', '$city', '$email', now(),'$phone','0')";
			// thực thi câu $sql với biến connect lấy từ file connection.php
				mysqli_query($connect,$sql);

				echo '<script language="javascript">';
				echo 'alert("chúc mừng bạn đã đăng ký thành công")';
				echo '</script>';
				$url="login.php";
				echo "<meta http-equiv='refresh' content='0;url=$url' />";
			}elseif ($passAdmin!="admin123") {
				echo '<script language="javascript">';
				echo 'alert("bạn muốn tạo tài khoản nhà quản trị yêu cầu nhập đúng passAdmin")';
				echo '</script>';
			}else{
				$sql = "INSERT INTO users(username, password, address, email, createdate,phone,permision) VALUES ( '$username', '$password1', '$city', '$email', now(),'$phone','1')";
			// thực thi câu $sql với biến connect lấy từ file connection.php
				mysqli_query($connect,$sql);
				echo '<script language="javascript">';
				echo 'alert("Đăng ký thành công tài khoản nhà quản trị")';
				echo '</script>';
				$url="login.php";
				echo "<meta http-equiv='refresh' content='0;url=$url' />";
			}

		}
	}
}
?>