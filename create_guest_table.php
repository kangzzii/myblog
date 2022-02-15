<?php
include "include.php";
$sql="create table guest(
	no int auto_increment primary key
	,memo text
	,writer varchar(20)
	,writeday varchar(20)
	)";
mysqli_query($conn,$sql);
$sql2="create table guest_re(
	no int auto_increment primary key
	,memo text
	,writer varchar(20)
	,p_no int
	)";
mysqli_query($conn,$sql2);
echo"게스트 테이블 완료";
?>