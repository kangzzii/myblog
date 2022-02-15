<?php
include "include.php";
$no=$_POST["no"];
$title=$_POST["title"];
$writeday=date("Y-m-d");
$content=$_POST["content"];
$sql="update qna2 set title='$title',writeday='$writeday',content='$content' where no=$no";
mysqli_query($conn,$sql);
?>
<script>
    alert("수정이 완료되었습니다.")
</script>
<meta http-equiv="refresh" content="0,url='qna_content.php?no=<?php echo $no?>'">