<?php
    $url = 'http://localhost:8000/api/customer/' . $_POST['id'];
    $ch  = curl_init();

    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    
    curl_close($ch);

    echo $result;
?>