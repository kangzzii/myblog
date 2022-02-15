<?php
include "include.php";
if(!isset($_SESSION["id"])){
    ?>
    <script>
    alert("로그인을 하셔야 댓글 작성이 가능합니다.")
    history.go(-1);
    </script>
<?php }else{
$memo=$_GET["memo"];
$writer=$_SESSION["id"];
$writeday=date("Y-m-d");
$p_no=$_GET["p_no"];
// echo $p_no;
$sql="insert into board_re (memo,writer,writeday,p_no) values ('$memo','$writer','$writeday',$p_no)";
mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="0,url='board_content.php?no=<?php echo $p_no?>'">
<?php }?>