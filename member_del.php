<?php
include "include.php";
$usid=$_SESSION["id"];
$sql="delete from myblog_admin where usid='$usid'";
mysqli_query($conn,$sql);
session_destroy();
?>
<script>
    alert("탈퇴 되었습니다. 감사합니다.")
</script>
<meta http-equiv="refresh" content="0;url='index.php'">