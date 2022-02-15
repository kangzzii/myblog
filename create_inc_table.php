<?php
include "include.php";
$sql="create table inc(
    no int auto_increment primary key
    ,title varchar(50)
    ,writer varchar(20)
    ,writeday varchar(20)
    ,content text
    ,fname varchar(50)
    ,hit int default 0
    )
    ";
mysqli_query($conn,$sql);
?>