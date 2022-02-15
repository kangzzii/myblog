<?php
	include "include.php";
	$memo=$_POST["memo"];
	$writeday=date("Y-m-d[h:i:s]");
	$writer=$_SESSION["id"];
	$sql="insert into guest (memo,writeday,writer) values ('$memo','$writeday','$writer')";
	mysqli_query($conn,$sql);
?>
<script>
    alert("방명록 작성이 완료 되었습니다.")
</script>
<meta http-equiv="refresh" content="0;url='guest.php'">