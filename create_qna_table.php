<?php
include "include.php";
$sql="create table qna2(
    no int auto_increment primary key
    ,title varchar(50)
    ,writer varchar(20)
    ,writeday varchar(20)
    ,content text 
    ,step int 
    ,p_no int
    ,secret varchar(1)
    )";
mysqli_query($conn,$sql);
echo"qna테이블 생성완료"
?>