<?php 
    session_start();
?>

<!DOCTYPE html> 
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Owl-Carousel 2 CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    
    <!-- Custom CSS File-->
    <link rel="stylesheet" href="css/style.css">

    <?php 
        /* 
            Require Functions PHP File
        */
        include ('./connection/functions.php');
    ?>
</head>
<body>
<header>
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <div class="nav-login">
                
                <?php 
                    if (isset($_SESSION['u_id'])) {
                        echo '<form action="php_action/logout.act.php" method="POST">
                            <button type="submit" name="personal-submit">Personal</button>
                            <button type="submit" name="logout-submit">Logout</button>
                            </form>';
                    } else {
                        echo '<form action="php_action/login.act.php" method="POST"> 
                            <input type="text" name="username" placeholder="Username or Email">
                            <input type="password" name="password" placeholder="Password">
                            <button type="submit" name="login-submit">Login</button>
                            </form>
                            <a href="signup.php">Signup</a>';
                    }
                ?>
                
            </div>
        </div>
    </nav>
</header>