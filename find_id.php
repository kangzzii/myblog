<?php
include "include.php";
$usname=$_POST["usname"];
$usemail=$_POST["usemail"];
$sql="select * from myblog_admin where usname='$usname' and usemail='$usemail'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
if($row["usid"]){
?>
<form name="frm1" method="post" action="idpw.php">
    <input type="text" name="usid" value="<?php echo$row["usid"]?>">
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