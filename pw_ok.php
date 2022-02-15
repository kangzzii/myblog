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
$usid=$_POST["usid"];
$sql="select * from myblog_admin where usname='$usname'and usid='$usid'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
if(!isset($row["uspw"])){
    ?>
    <script>
        alert("해당 되는 계정이 없습니다.");
        location.href="idpw.php"
    </script>
    <?php
} else{?>
<form name="frmPw" method="post" action="idpw.php">
    <input type="text" name="result2" value="<?php echo $row["uspw"]?>">
</form>
<script>
    document.frmPw.submit();
</script>
<?php }?>
</body>
</html>