<?php
include "include.php";
$title=$_POST["title"];
$writer=$_POST["writer"];
$content=$_POST["content"];
$writeday=date("Y-m-d");
$sql="insert into board (title,writer,writeday,content) values ('$title','$writer','$writeday','$content')";
mysqli_query($conn,$sql);
?>
<script>
    alert("게시물이 추가 되었습니다.")
</script>
<meta http-equiv="refresh" content="0,url='board.php'">