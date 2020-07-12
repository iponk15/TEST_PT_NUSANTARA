<?php
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"http://localhost:8000/api/customer");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
    
    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $server_output = curl_exec($ch);
    
    curl_close ($ch);

    echo $server_output;
?>