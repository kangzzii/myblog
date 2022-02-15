<?php
$conn=mysqli_connect("localhost","rkd3116","dnsaud650~","rkd3116");
// $sql="create table notice (
//     no int AUTO_INCREMENT PRIMARY KEY
//     ,title varchar(30)
//     ,content text
//     ,writer varchar(30)
//     ,writeday varchar(30)
//     ,hit int 
//     )";
for($i=0;$i<150;$i++){
    $sql="insert into notice (title,writer,writeday,content) values ('$i 번째 공지사항입니다','관리자','2021-12-09','공지사항테스트입니다')";
    mysqli_query($conn,$sql);
}
// mysqli_query($conn,$sql);

echo "작성완료";
?>

