<?php require_once("connectdb.php");
$username = $_GET['username'];
$email = $_GET['email'];

$sql = "SELECT * FROM users WHERE username='".$username."' ;";
$sql1 = "SELECT * FROM users WHERE email='".$email."' ;";
$result = mysqli_query($connect,$sql);
$result1 = mysqli_query($connect,$sql1);

if(mysqli_num_rows($result)>0){
  if(mysqli_num_rows($result1)>0){
    echo 'Tên đăng nhập và email đã có người sử dụng';
  }else{
    echo 'Tên đăng nhập đã có người sử dụng';
  }
}else{
  if(mysqli_num_rows($result1)>0){
    echo 'Email đã có người sử dụng';
  }else{
    header("HTTP/1.0 204 No Content");
  }

}
?>
