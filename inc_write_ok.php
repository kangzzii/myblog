<?php
include "include.php";
$title=$_POST["title"];
$content=$_POST["content"];
$writer=$_POST["writer"];
$writeday=date("Y-m-d");
// 파일서버 
$upload=$_SERVER["DOCUMENT_ROOT"]."/file/";
$usfile=basename($_FILES["usfile"]["name"]);
$uploadfile=$upload.$usfile;
move_uploaded_file($_FILES["usfile"]["tmp_name"],$uploadfile);
// 파일서버 끝
$sql="insert into inc (title,content,writer,writeday,fname) value ('$title','$content','$writer','$writeday','$usfile')";
mysqli_query($conn,$sql);
?>
<script>
    alert("작성이 완료되었습니다.")
</script>
<!-- <meta http-equiv="refresh"content="0,url='inc.php'"> -->