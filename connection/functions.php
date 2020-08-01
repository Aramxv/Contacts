<?php 
    /* 
        Require MySQL Connection
    */
    require ('connection/database.php');

    /* 
        Require Contact Class
    */
    require ('connection/contact.php');

    /* 
        Require Personal Class
    */
    require ('connection/personal.php');

    // DBController Object
    $db = new DBController();

    // Contact Object
    $contact = new Contact($db);

    // Personal Object
    $personal = new Personal($db);
?>


