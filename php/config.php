<?php
    $conn = mysqli_connect("localhost", "root", "29092000esn", "chatapp");
    if($conn){
        echo "Database Connected" .mysqli_connect_error();
    }
?>