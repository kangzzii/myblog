<?php
include "include.php";
$sql="alter table myblog_admin add column point int default 100";
mysqli_query($conn,$sql);
?>