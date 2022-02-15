<?php
include "include.php";
$usid=$_POST["usid"];
$uspw=$_POST["uspw"];
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
$sql="update myblog_admin set uspw='$uspw',usname='$usname',usbd='$usbd',gender='$gender',usemail='$usemail',grade='$grade',hobby='$tot',memo='$memo' where usid='$usid'";
$rs=mysqli_query($conn,$sql);
session_destroy();
?>
<script>
    alert("수정완료되었습니다.로그인화면으로 이동합니다")
</script>
<meta http-equiv="refresh" content="0,url='login.php'">