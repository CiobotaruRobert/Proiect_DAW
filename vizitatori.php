<?php
require('dbh.inc.php');

$query = "SELECT total_views FROM vizite";
      
    $result = mysqli_query($conn, $query);
      
    
        $numar_vizite = mysqli_num_rows($result);
        
?>