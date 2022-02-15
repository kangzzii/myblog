<?php
include "include.php";
$usid=$_GET["usid"];
$sql="select * from myblog_admin where usid='$usid'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID 중복체크</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="script.js" defer="defer"></script>
</head>
<body>
    <div align="center">
        <?php
        if(isset($row["usid"])){
            ?>
            <div style="margin-top:30px;width:200px;cursor:pointer;
            padding:20px;font-weight:bold;text-shadow:2px 2px 3px #333;
            background-color:orange;color:white;border-radius:10px" onclick="send()">
                사용할 수<br>
                없는 아이디 입니다.
            </div>
        <?php
        }else{
        ?>
            <div style="margin-top:30px;width:200px;cursor:pointer;
            padding:20px;font-weight:bold;text-shadow:2px 2px 3px #333;
            background-color:seagreen;color:white;border-radius:10px" onclick="send2()">
                사용 가능한<br>
                아이디 입니다. 
            </div>
        <?php }?>
    </div>
    <script>
        function send(){
            opener.document.frm1.usid.value="";
            opener.document.frm1.usid.focus();
            self.close();
        }
        function send2(){
            opener.document.frm1.idok.value="ok";
            opener.document.frm1.uspw.focus();
            self.close();
        }
    </script>
</body>
</html>
