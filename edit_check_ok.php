<?php
include "include.php";
$usid=$_SESSION["id"];
$uspw=$_POST["uspw"];
$sql="select * from myblog_admin where usid='$usid'and uspw='$uspw'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
if($row["uspw"]){
    ?>
    <script>
        location.href="edit.php"
    </script>
    <?php
} else{ ?>
    <script>
        alert("비밀번호를 확인해주세요")
        history.go(-1);
    </script>
    <?php
}
?>