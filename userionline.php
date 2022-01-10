<?php

require('dbh.inc.php');
session_start();
$session = session_id();
$time = time();
$mysql = "SELECT * FROM userionline WHERE session='$session'";
$result = mysql_query($mysql);
$count = mysql_num_rows($result);
if($count == NULL)
   mysql_query("INSERT INTO userionline (session, time) VALUES ('$session', '$time')
   else
   mysql_query(UPDATE userionline SET time='$time' WHERE session = '$session'");
   $count_user = mysql_query("SELECT * FROM userionline");
   $count_user = mysql_num_rows($count_user);
   echo"$count_user";

?>