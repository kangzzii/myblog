<?php
include "include.php";
$memo=$_POST["re"];
$p_no=$_POST["p_no"];
$page=$_POST["page"];
$writer=$_SESSION["id"];
$sql="insert into guest_re (memo,writer,p_no) values ('$memo','$writer',$p_no)";
mysqli_query($conn,$sql);
?>
<script>
    alert("답변 등록이 완료 되었습니다.")
</script>
<meta http-equiv="refresh" content="0;url='guest.php?page=<?php echo $page?>'">