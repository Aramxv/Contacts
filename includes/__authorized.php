<?php 
    $contact_shuffle = $contact->getData();

    /* 
        Request Method POST
    */
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        // CALL METHOD addToPersonal
        $personal->addToPersonal(
            $_POST['contact_id'], 
            $_POST['user_id']);
    }
?>

<!-- General Contact-->
<section id="contact-list">
    <div class="container py-5">
        <h6 id="contact-head" class="text-left">Contacts</h6>
        <hr class="mt-1">
        <!-- Owl Caraousel-->
        <div class="owl-carousel owl-theme" >
            <!-- Foreach Loop-->
           <?php foreach($contact_shuffle as $item) { ?>
            <div class="item py-2 m-2">
                <div class="contact font-rale">
                    <a href="#"><img src="./assets/contact.png" class="img img-fluid"></a>
                    <div class="text-center">
                        <p id="contact-name"><?php echo $item['contact_name'] ?? "Unknown Name"; ?></p>
                    </div>
                        <p id="contact-number"><?php echo $item['contact_phone'] ?? "Uknown Phone;" ?></p>
                        <p id="contact-mail"><?php echo $item['contact_mail'] ?? "Unknown EMail"; ?></p>
                        <p id="contact-address"><?php echo $item['contact_address'] ?? "Unknown Address"; ?></p>
                    <form method="post">
                        <input type="hidden" name="contact_id" value="<?php echo $item['c_id'] ?? '1'; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $item['id'] ?? '1'; ?>">
                        <button type="submit" name="contact-submit" class="btn btn-warning">Add to Personal</button>
                    </form>
                </div>
                
            </div>
            <?php } //!Foreach Closing ?>
        </div>
        <!-- //!Owl Caraousel-->
    </div>
</section>
<!-- //!General Contact-->