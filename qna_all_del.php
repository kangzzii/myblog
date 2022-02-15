<?php
include "include.php";
$p_no=$_GET["p_no"];
$sql="delete from qna2 where p_no=$p_no";
mysqli_query($conn,$sql);
?>
<script>
    alert("삭제가 완료되었습니다.")
</script>
<meta http-equiv="refresh" content="0,url='qna.php'">