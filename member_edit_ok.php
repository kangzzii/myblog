<?php
include "include.php";
$usid=$_POST["usid"];
$uspw=$_POST["uspw2"];
$usname=$_POST["usname"];
$usbd=$_POST["usbd"];
$gender=$_POST["gender"];
$usemail=$_POST["usemail"];
$grade=$_POST["grade"];
$memo=$_POST["memo"];
if(isset($_POST["hobby"])){
    $hobby=$_POST["hobby"];
    $cnt=count($hobby);
    $tot="";
    for($i=0;$i<$cnt;$i++){
        $tot=$tot.$hobby[$i]."/";
    }
}else{
    $tot="/";
}
$sql="update myblog_admin set uspw='$uspw',usname='$usname',usemail='$usemail',gender='$gender',grade='$gender',usbd='$usbd',hobby='$tot',memo='$memo' where usid='$usid'";
mysqli_query($conn,$sql);
session_destroy();
?>
<script>
    alert("수정이 완료 되었습니다.다시 로그인 화면으로 돌아갑니다.")
</script>
<meta http-equiv="refresh" content="0,url='login.php'">