<?php

    $server   = "localhost";
    $username = "root";
    $password = "root";
    $db       = "db_client_book";
 
    //create a connection
    $conn = mysqli_connect( $server, $username, $password, $db);
        //connection
        
         if(!$conn)
         {
            
            die("connection failed: " . mysqli_connect_error());
         }
       /* else
        {
            echo "Connected Successfully!";
        }
        */
?>