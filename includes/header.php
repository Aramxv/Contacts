<?php 
    session_start();
?>

<!DOCTYPE html> 
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
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