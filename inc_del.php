<?php
include "include.php";
$no=$_GET["no"];
$fname=$_GET["fname"];
$sql="delete from inc where no=$no";
mysqli_query($conn,$sql);
// 파일 서버에서 파일 지우기
unlink("../file/$fname");
?>
<script>
    alert("삭제가 완료되었습니다.")
</script>
<meta http-equiv="refresh"content="0,url='inc.php'">