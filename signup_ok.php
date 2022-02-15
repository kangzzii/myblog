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
$sql="insert into myblog_admin (usid,uspw,usname,usemail,gender,grade,usbd,hobby,memo) values ('$usid','$uspw','$usname','$usemail','$gender','$grade','$usbd','$tot','$memo')";
mysqli_query($conn,$sql);
?>
<script>
    alert("가입을 환영합니다.로그인 창으로 이동합니다!")
</script>
<meta http-equiv="refresh" content="0,url='login.php'">