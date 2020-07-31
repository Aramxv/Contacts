<?php
    /* 
        Authorization
        It's going to check the submit button that's 
        actually being clicked and test
    */
    if (isset($_POST['submit'])) {

        include_once '../connection/database.php';

        /* 
            Escapes the special characters in a  
            string for use in an SQL statement.
        */
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);

        /* 
            Error handlers - Check for empty fields
        */
        if (empty($name) || empty($email) || empty($username) || empty($password)) {
            /* 
                Always check for eerors first 
                before you check for success
            */
            header("location: ../signup.php?signup=emptyFields");
            exit();
        } else {
            /* 
                Check if input characters are valid
                by performing a regular expression match.
                Validate the Name
            */
            if (!preg_match("/^[a-zA-Z]*$/", $name)) {
                header("location: ../signup.php?signup=invalidName");
                exit();
            } else {
                /* 
                    Validate the Email Address
                */
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("location: ../signup.php?signup=invalidEmailAddress");
                    exit();
                } else {
                    /* 
                        Check if the username is already existed in the database
                    */
                    $sql = "SELECT * FROM users WHERE username = $username";
                    $result = mysqli_query($connect, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($$resultCheck > 0) {
                        header("location: ../signup.php?signup=usernameIsTaken");
                        exit();
                    } else  {
                        /* 
                            Hash the password for secured system
                            Use Bcrypt Hashing
                        */
                        $hashpassword = password_hash($password, PASSWORD_DEFAULT);

                        /* 
                            Insert the User Information to Database
                        */
                        $sql = "INSERT INTO users (name, email, username, password) VALUES (?,?,?,?);";
                        $stmt = mysqli_stmt_init($connect);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            /* 
                                If somehow the connection and 
                                SQL prepared stetement failed
                            */
                            header("location: ../signup.php?signup=sqlConnectionError");
                            exit();
                        } else {
                            /* 
                                Bind the sql parameters
                            */
                            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashpassword);
                            mysqli_stmt_execute($stmt);

                            header("location: ../signup.php?signup=success");
                            exit();
                            
                        }

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
        header("location: ../signup.php");
        exit();
    }
?>