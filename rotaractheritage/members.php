<?php $carousel="yes";
include ( "./inc/header.inc.php"); ?>
<script>
$(".cover").css({"background": "url(./assets/members/heroBg.jpg)","width":"100%","height":"100vh"});
</script>
<div class="logox">
    <img src="./assets/members/frame.png" alt="">
</div>


     <div class="bottom">
           <p class="p_class">OUR TEAM</p>
     </div>

     <section class="center slider_members">
     <?php
      $userid = DB::query('SELECT * FROM council');  
      foreach($userid as $p){
      echo "
      <div>
            <img data-lazy='./assets/members/".$p['dp']."' id='img' alt=''>
            <h3 class='h3_class'>".$p['name']."</h3>
            <p class='p_class'>".$p['post']."</p>
      </div>";
      }
      ?>
     </section>
     <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
     <script src="./slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
     <script type="text/javascript">
     $(document).on('ready', function() {
     $(".center").slick({

     dots: false,
     lazyLoad: 'ondemand',
     infinite: false,
     centerMode: true,
     slidesToShow: 2,
     slidesToScroll: 1,
     arrows: false,
     autoplay: true,
     autoplaySpeed: 1500,

     responsive: [{

     breakpoint: 1024,
     settings: {
          slidesToShow: 2,
          infinite: true
     }

}, {

     breakpoint: 600,
     settings: {
          slidesToShow: 1,
          dots: true
     }

}, {

     breakpoint: 300,
     settings: "unslick" //destroy slick

}]

});

});

</script>
<style>
      #img:hover{
            
      }
</style>
</body>
</html>
