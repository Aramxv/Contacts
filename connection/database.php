<?php
   /* 
        Database Credentials 
        Default Settings (user root no password) 
    */
    define ('DB_SERVER', 'localhost');
    define ('DB_USERNAME', 'root');
    define ('DB_PASSWORD', '');
    define ('DB_NAME', 'contacts');

    /* 
        Attempt to connect to MySQL Database
    */
    $connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    /* 
        if $connect have a null value, it will imply that system is not connected to database
        otherwise it is connected.  
    */
    if ($connect === false) {
        die ("ERROR: Could not connect. " . mysqli_connect_errror());
    }
    else{
        // Echo a Test Connection String
        //echo 'YEEEES! Connected';
    }
?>