<?php
include "include.php";
if(!isset($_SESSION["id"])){
    ?>
    <script>
    alert("로그인을 하셔야 댓글 작성이 가능합니다.")
    history.go(-1);
    </script>
<?php }else{
$memo=$_POST["memo"];
$writer=$_SESSION["id"];
$writeday=date("Y-m-d");
$p_no=$_POST["p_no"];
$point=$_POST["result"];
$sender=$_POST["sender"];
// 댓글작성자랑 포인트 주는 사람이 같을때
if($writer==$sender){
?>
    <script>
        alert("자기자신 선물은 불가합니다. 댓글만 작성됩니다");
        history.go(-1);
    </script>
<?php
// 댓글 작성자랑 포인트 주는사람이 다를때
}else{
    // 포인트 잔액조회하기
    $sql2="select * from myblog_admin where usid=$writer";
    $rs2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($rs2);
    // 잔액이 부족할때
    if($row2["point"]<$point){
?>
        <script>
            alert("포인트가 부족합니다.회원님의 잔여 포인트는<?php echo $row2["point"]?>입니다. 댓글만 작성됩니다.");
            history.go(-1);
        </script>
<?php
    //잔액이 충분했을때
    } else{
        $pointsql="update myblog_admin set point=point-$point where usid='$writer'";
        $pointrs=mysqli_query($conn,$pointsql);
        $sendersql="update myblog_admin set point=point+$point where usid='$sender'";
        $senderrs=mysqli_query($conn,$sendersql);
        $present="select * from myblog_admin where usid='$writer'";
        $presentrs=mysqli_query($conn,$present);
        $presentrow=mysqli_fetch_array($presentrs);
    ?>
    <script>
        alert("현재 남은 포인트는 <?php echo $presentrow["point"]?> 입니다.")
    </script>
<?php } } 
// 그냥 댓글만 써지는 덩어리
    $sql="insert into inc_re (memo,writer,writeday,p_no) values ('$memo','$writer','$writeday',$p_no)";
    mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="0,url='inc_content.php?no=<?php echo $p_no?>'">
<?php
}?>