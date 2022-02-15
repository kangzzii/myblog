<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include "include.php";
$usname=$_POST["usname"];
$usemail=$_POST["usemail"];
$sql="select * from myblog_admin where usname='$usname'and usemail='$usemail'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
if(!isset($row["usid"])){
    ?>
    <script>
        alert("해당 되는 계정이 없습니다.");
        location.href="idpw.php"
    </script>
    <?php
}else{?>
<form name="frmId" method="post" action="idpw.php">
    <input type="text" name="result1" value="<?php echo $row["usid"]?>">
</form>
<script>
    document.frmId.submit();
</script>
<?php }?>
</body>
</html>
