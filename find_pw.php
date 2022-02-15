<?php
include "include.php";
$usname=$_POST["usname"];
$usid=$_POST["usid"];
$sql="select * from myblog_admin where usname='$usname' and usid='$usid'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
if($row["usid"]){
?>
<form name="frm1" method="post" action="idpw.php">
    <input type="text" name="uspw" value="<?php echo$row["uspw"]?>">
</form>
<script>
    document.frm1.submit()
</script>
<?php
}else{
?>
    <script>
        alert("해당되는 계정이 없습니다.");
        history.go(-1);
    </script>
<?php
}
?>