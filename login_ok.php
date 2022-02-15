<?php
include "include.php";
$usid=$_POST["usid"];
$uspw=$_POST["uspw"];
$sql="select * from myblog_admin where usid='$usid' and uspw='$uspw'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
if($row["usid"]){
    $_SESSION["id"]=$row["usid"];
?>
    <script>
    alert("로그인을 환영합니다.")
    </script>
    <meta http-equiv="refresh" content="0,url='index.php'">
<?php
}else{
?>
    <script>
    alert("계정 혹은 비밀번호를 확인하세요.");
    history.go(-1);
    </script>
<?php
}
?>