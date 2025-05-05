<?php 
$carousel="no"; 
include ( "./inc/header.inc.php");
include ( "./inc/contact.inc.php");
?>
<div class="contact__container">
    <div class="form new__contact">
        <a href="#" class="previous round hide">‹</a>
        <h3 id="area">Contact Us</h3>

            <h2 id="new-details">Feel free to get in touch with us if you have a new project or simply something awesome</h2>
            <div class="input">
                <div class="email">
                    <form action="" method="post">
                        <input type="text" name="name" class="contact__input no_back" placeholder="Name" autocomplete="off">
                        <div class="contact__line1 line"></div>
                        <input type="email" name="email" class="contact__input contact__email no_back" placeholder="E-mail" autocomplete="off">
                        <div class="contact__line2 line"></div>
                        <textarea name="message" data-min-rows="1" rows="1" class="contact__input contact__message autoExpand no_back" placeholder="Message"></textarea>
                        <div class="contact__line3 line"></div>
                        <input type="submit" class="contact__final" name="submit" value="Submit">
                    
                    </form>
                </div><!--Email-->
            </div><!--Input-->
        </div>
</div>
<script src="js/contact__hover.js"></script>
<script src="js/textarea_as.js"></script>