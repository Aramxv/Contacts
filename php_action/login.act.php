<?php

    /* 
        Simply start a session 
        to let the user login
    */
    session_start();
    /* 
        Authorization
        It's going to check the submit button that's 
        actually being clicked and test
    */
    if (isset($_POST['login-submit'])) {

        include_once '../connection/database.php';

        /* 
            Escapes the special characters in a  
            string for use in an SQL statement.
        */
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);

        /* 
            Error handlers - Check for empty fields
        */
        if (empty($username) || empty($password)) {
            header("location: ../index.php?login=emptyFields");
            exit();
        } else {
            /* 
                Check if the username 
                existed in the Database 
            */
            $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";
            $result = mysqli_query($connect, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck < 1) {
                header("location: ../index.php?login=error105");
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)) {
                    /* 
                        De-hash the password
                    */
                    $hashedPasswordCheck = password_verify($password, $row['password']);
                    if ($hashedPasswordCheck == false) {
                        header("location: ../index.php?login=error205");
                        exit();
                    } elseif ($hashedPasswordCheck = true) {
                        /* 
                            Log in the user 
                        */
                        $_SESSION['u_id'] = $row['_id'];
                        $_SESSION['u_name'] = $row['name'];
                        $_SESSION['u_email'] = $row['email'];
                        $_SESSION['u_username'] = $row['username'];
                        header("location: ../index.php?login=success");
                        exit();
                    }
                }
            }
        }
    } else {
        /* 
            Authorization
            In case that the user just type the file in the URL
            Send the user back to signup.php
        */
        header("location: ../index.php?login=error305");
        exit();
    }

?>