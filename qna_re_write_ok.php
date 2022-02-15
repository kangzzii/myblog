<?php
include "include.php";
$title=$_POST["title"];
$writer=$_POST["writer"];
$writeday=date("Y-m-d");
$content=$_POST["content"];
$step=$_POST["step"]+1;
$p_no=$_POST["p_no"];
// 비밀글이면 자동 비밀글답변 되게
$sql2="select * from qna2 where p_no=$p_no order by no asc";
$rs2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($rs2);
if($row2["secret"]=="1"){
$secret=1;
}else{
$secret=0;
}
//자동 설정 끝
$sql="insert into qna2 (writer,title,content,writeday,step,p_no,secret) values('$writer','$title','$content','$writeday',$step,$p_no,'$secret')";
mysqli_query($conn,$sql);
?>
<script>
    alert("답변이 완료되었습니다.")
</script>
<meta http-equiv="refresh" content="0,url='qna.php'">