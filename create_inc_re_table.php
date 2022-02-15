<?php
include "include.php";
$sql="create table inc_re(
    no int auto_increment primary key
    ,writer varchar(20)
    ,writeday varchar(20)
    ,memo varchar(100)
    ,p_no int
    )
    ";
mysqli_query($conn,$sql);
?>