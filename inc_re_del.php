<?php
include "include.php";
$no=$_GET["no"];
$p_no=$_GET["p_no"];
$sql="delete from inc_re where no=$no";
mysqli_query($conn,$sql);
?>
<script>
    alert("삭제 완료")
</script>
<meta http-equiv="refresh" content="0,url='inc_content.php?no=<?php echo $p_no?>'">;