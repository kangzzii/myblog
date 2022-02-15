<?php
include "include.php";
$title=$_POST["title"];
$writer=$_POST["writer"];
$writeday=date("Y-m-d");
$content=$_POST["content"];
$step=0;
$sql="select ifnull(max(p_no),0)+1 as p_no from qna2";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
$p_no=$row["p_no"];
if(isset($_POST["secret"])){
    $secret=1;
}else{
    $secret=0;
}
$sql2="insert into qna2 (writer,title,content,writeday,step,p_no,secret) values ('$writer','$title','$content','$writeday',$step,$p_no,'$secret')";
mysqli_query($conn,$sql2);
?>
<script>
    alert("작성이 완료되었습니다.")
</script>
<meta http-equiv="refresh" content="0,url='qna.php'">