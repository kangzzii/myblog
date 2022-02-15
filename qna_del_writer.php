<?php
include "include.php";
$no=$_GET["no"];
$sql="update qna2 set title='삭제된 질문 입니다.',writer='',writeday='' where no=$no";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
?>
<script>
    alert("삭제가 완료되었습니다.")
</script>
<meta http-equiv="refresh" content="0,url='qna.php'">