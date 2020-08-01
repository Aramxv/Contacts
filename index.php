<?php
    include_once 'includes/header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        
        <?php 
            /* 
                Authorized Section
                This side is for authorized user only 
            */
            if (isset($_SESSION['u_id'])) {
                include 'includes/__authorized.php';
            } else {
                echo '<h4>Contact your friends wherever you are!</h4>
                <img class="illustrator" src="assets/searchcontact.svg" alt="illustrator">';
            }
        ?>

    </div>
</section>

<?php
    include_once 'includes/footer.php';
?>