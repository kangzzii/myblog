<?php
include "include.php";
$no=$_GET["no"];
$p_no=$_GET["p_no"];
$sql="delete from board_re where no=$no";
mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="0;url='board_content.php?no=<?php echo $p_no?>'">