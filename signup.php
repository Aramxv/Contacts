<?php
    include_once 'includes/header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        <h3>Sign Up</h3>
        <form class="signup-form" action="php_action/signup.act.php" method="POST">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="email" placeholder="Email Address">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <hr class="my-1">
            <button type="submit" name="signup-submit">Sign up</button>
        </form>
    </div>
</section>

<?php
    include_once 'includes/footer.php';
?>