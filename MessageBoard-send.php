<?php

    include("../config.php"); 
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name) or die("Connection Failed");

    $message = $_GET['msg'];
    $sentDate = date('m/d/Y h:i:s a');

    $site_admin = $_COOKIE['site_username'];
    $query = "SELECT admin FROM users WHERE username='$site_admin' limit 1";
    $find_admin;
    if ($result = $conn->query($query))
    {
        while ($row = $result->fetch_assoc())
        {
            if ($row['admin'])
                $find_admin = 1;
            else
                $find_admin = 0;
        }
    }
    

    $sql = "INSERT INTO messages (admin, message, sentDate) 
        VALUES ('$find_admin', '$message', '$sentDate')";
    
    $conn -> query($sql);
    
    header('Location: MessageBoard.php');

    $conn -> close();
?>