<?php
    session_start();
    
    function connectDB() {
        $host        = "host=127.0.0.1";
        $port        = "port=5432";
        $dbname      = "dbname = sarah.dewi51";
        $credentials = "user= postgres password=";

        // Create connection
        $db = pg_connect( "$host $port $dbname $credentials"  );

        // Check connection
        if(!$db) {
          echo "Error : Unable to open database\n";
        } else {
          echo "\n";
          $setsearchpath = "SET search_path to TOKOKEREN";
          pg_query($db, $setsearchpath);
          return $db;
        }
    }

?>