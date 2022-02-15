<?php
include "include.php";
$no=$_POST["no"];
$title=$_POST["title"];
$content=$_POST["content"];
$writeday=date("Y-m-d");
// 파일서버 
$upload=$_SERVER["DOCUMENT_ROOT"]."/file/";
$usfile=basename($_FILES["usfile"]["name"]);
$uploadfile=$upload.$usfile;
move_uploaded_file($_FILES["usfile"]["tmp_name"],$uploadfile);
// 파일서버 끝
$sql="update inc set title='$title',content='$content',writeday='$writeday',fname='$usfile' where no=$no";
mysqli_query($conn,$sql);
?>
<script>
    alert("수정이 완료되었습니다.")
</script>
<meta http-equiv="refresh"content="0,url='inc_content.php?no=<?php echo $no?>'">