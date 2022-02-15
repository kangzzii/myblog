<?php
include "include.php";
$sql="create table board(
    no int auto_increment primary key
    ,title varchar(100)
    ,writer varchar(20)
    ,writeday varchar(20)
    ,content text
    ,hit int default 0
    )";
$rs=mysqli_query($conn,$sql);
$sql2="create table board_re(
    no int auto_increment primary key
    ,memo varchar(100)
    ,writer varchar(20)
    ,writeday varchar(20)
    ,p_no int
    )";
$rs=mysqli_query($conn,$sql2);
echo"테이블 생성완료"
?>