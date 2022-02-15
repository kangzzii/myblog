<?php
include "include.php";
$no=$_GET["no"];
$sql="delete from qna2 where no=$no";
mysqli_query($conn,$sql);
?>
<script>
    alert("답변삭제가 완료되었습니다.")
</script>
<meta http-equiv="refresh" content="0,url='qna.php'">