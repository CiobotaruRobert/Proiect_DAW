<?php
require('header.php');
require('dbh.inc.php');
require('vizitatori.php');


$visitor_ip=$_SERVER['REMOTE_ADDR'];

$query="SELECT * FROM counter_table";
$result=mysqli_query($conn,$query);
$total_visitors=mysqli_num_rows($result);

$query="SELECT * FROM counter_table WHERE ip_address='$visitor_ip'";
$result=mysqli_query($conn,$query);
$contor=mysqli_num_rows($result);
if($contor<1)
{
$query="INSERT INTO counter_table(ip_address) VALUES('$visitor_ip')";
$result=mysqli_query($conn,$query);
}  

require('footer.php');
?>

<html>
    <head>
        <link rel="stylesheet" href="statistici_css.css">
    </head>
    <body>
        <div class = "wrapper">
            <h1>Vizitatori unici &nbsp&nbsp&nbsp&nbsp Numar vizite</h1>
            <h3><?php echo"$total_visitors&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; echo"$numar_vizite";?></h3>
        </div>
    </body>
</html>