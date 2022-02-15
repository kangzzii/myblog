<?php
include "include.php";
$no=$_GET["no"];
$sql="delete from guest_re where no=$no";
mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="0;url='guest.php'">