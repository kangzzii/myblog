<?php
include "include.php";
$usid=$_SESSION["id"];
// echo $id;
$sql="delete from myblog_admin where usid='$usid'";
$rs=mysqli_query($conn,$sql);
?>
<script>
    alert("탈퇴 되었습니다 ㅠㅠ")
</script>
<meta http-equiv="refresh" content="0,url=index.php">