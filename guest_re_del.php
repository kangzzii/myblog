<?php
include "include.php";
$no=$_GET["no"];
// echo $no;
$sql="delete from guest_re where p_no=$no";
mysqli_query($conn,$sql);
$sql="delete from guest where no=$no";
mysqli_query($conn,$sql);
?>
<script>
    alert("삭제가 완료 되었습니다.")
</script>
<meta http-equiv="refresh" content="0;url='guest.php'">