<?php
    $post['customer_name']     = $_POST['customer_name'];
    $post['customer_email']    = $_POST['customer_email'];
    $post['customer_password'] = $_POST['customer_password'];
    $post['customer_gender']   = $_POST['customer_gender'];
    $post['customer_menikah']  = $_POST['customer_menikah'];
    $post['customer_address']  = $_POST['customer_address'];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"http://localhost:8000/api/customer/" . $_POST['customer_id']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    
    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $server_output = curl_exec($ch);
    
    curl_close ($ch);

    echo $server_output;
?>