<?php

    $db = connectDB();

    $email_to_check = $_SESSION['email'];

    
    $sql = "SELECT * FROM PELANGGAN WHERE email = '$email_to_check' AND is_penjual = TRUE";
    $result= pg_query($db, $sql);
    if (!$db) {
        die("Connection failed ");
    }

    if ($result> 0) {
        // output data of each row
        while($row = pg_fetch_assoc($result)) {
            $_SESSION['is_penjual'] = TRUE;
            break;
        }
    } 
    else{
        $_SESSION['is_penjual'] = FALSE;
    }
?>