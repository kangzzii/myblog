<?php
include "include.php";
$no=$_POST["no"];
$title=$_POST["title"];
$content=$_POST["content"];
$writeday=date("Y-m-d");
$sql="update notice set title='$title',content='$content',writeday='$writeday' where no=$no";
mysqli_query($conn,$sql);
?>
<script>
    alert("공지사항이 수정 되었습니다.")
</script>
<meta http-equiv="refresh" content="0,url='notice_content.php?no=<?php echo $no?>'">