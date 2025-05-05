<?php $carousel="no";
include ( "./inc/header.inc.php");
?>
<!-- carousel -->

<div class="home-header">
    <div class="container-home">
        <div class="logo-home">
            <a href=""><img src="<?php print $_SERVER['MYVAR'];?>/assets/img/log1o.png" alt="" id="image-home"></a>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>


<div class="hero-home">
    <div class="hero-container">
        <img src="./assets/img/carousel/1.jpg" alt="">
    </div>
</div>

<div class="ban">
    <div class="banner-home">
        <div class="gradient-home">
            <h3>Nurturing Philanthropy for a Stronger Nation</h3>
        </div>
    </div>
</div>
<div class="team-home">
    <h3>Our Events Highlights</h3>
</div>
<div class="slider-home">
        
        <div class="arrow left-home"><i class="fas fa-chevron-left"></i></div>
        <div class="carousel-control carousel-left"></div>

        <div class="arrow right-home"><i class="fas fa-chevron-right"></i></div>
        <div class="carousel-control carousel-right"></div>

        <div class="marker">
            <div class="marker-container">

            </div>
        </div>

        <div class="items-index">
            <div class="item"><img src="./assets/img/carousel/1.jpg" alt="" width="500"></div>
            <div class="item"><img src="./assets/img/carousel/2.jpg" alt="" width="500"></div>
            <div class="item"><img src="./assets/img/carousel/3.jpg" alt="" width="500"></div>
            <div class="item"><img src="./assets/img/carousel/4.jpg" alt="" width="500"></div>
        </div>
    </div>
    <script src="./js/carousel.js"></script>

<style>
.item img {
  width: 50%;
}

.slider-home {
  position: relative;
  transition: all 0.2s;
  overflow: hidden;
  transform: translateY(-10%);
}

.carousel-control {
  position: absolute;
  height: 100%;
  width: 20%;
  top: 0;
  transition: opacity 0.3s;
  will-change: opacity;
  opacity: 0;
  z-index: 10;
}

.carousel-left {
  left: 0;
  background: linear-gradient(to left, transparent 0%, rgba(0, 0, 0, 0.18) 100%);
}

.carousel-right {
  right: 0;
  background: linear-gradient(to right, transparent 0%, rgba(0, 0, 0, 0.18) 100%);
}

.left-home {
  left: 15px;
}

.right-home {
  right: 15px;
}

.carousel-control:hover, .arrow:hover + .carousel-control {
  opacity: 1;
}

.arrow {
  opacity: 0;
  cursor: pointer;
  font-size: 30px;
  position: absolute;
  z-index: 11;
  top: 48% !important;
  transition: all 0.4s;
  color: black;
}

.slider-home:hover .arrow {
  opacity: 0.65;
}

.slider-home:hover .marker-container {
  opacity: 1;
}

.arrow:hover {
  opacity: 1 !important;
  transform: scale(1.5);
}

.items-index {
  position: relative;
  transition: all 0.4s;
  will-change: transform;
  z-index: 1;
  height: 100vh !important;
}

.item {
  position: absolute;
  top: 0;
  width: 100%;
  align-items: center;
  transition: all 0.4s;
  top: 50%;
  transform: translateY(-50%) scale(0.8);
  text-align: center;
  opacity: 0.8;
}
@media (max-width: 500px) {
  .item {
    transform: translateY(-50%) scale(0.7);
    opacity: 0.6;
  }
}

.marker-container {
  z-index: 9;
  position: absolute;
  bottom: 10px;
  right: 0;
  left: 0;
  text-align: center;
  opacity: 0;
  transition: all 0.2s;
}

.outer-circle {
  position: relative;
  width: 14px;
  display: inline-block;
  vertical-align: top;
  height: 14px;
  border: 2px solid black;
  border-radius: 50%;
  cursor: pointer;
  margin: 0 2px;
  transform: translate(-2px, -2px);
}

.inner-circle {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 8px;
  height: 8px;
  background: black;
  border-radius: 50%;
  transform: translate(-50%, -50%) scale(0);
  transition: all 0.4s;
}

.active-circle .inner-circle, .outer-circle:hover .inner-circle {
  transform: translate(-50%, -50%) scale(1);
}

.active {
  transform: translateY(-50%) scale(1);
  opacity: 1;
}

@media (max-width: 500px) {
  .active {
    z-index: 99;
  }
}

@media (max-width: 500px) {
  .active img {
    width: 80%;
  }
}
.greeting{
  font-size: 25px !important;
  letter-spacing: 1px !important; 
  text-align: center !important;
  padding: 0px 15px 0px 15px !important;
}
</style>

<!-- Be a part of it--><?php
include ( "./inc/cover.inc.php");
?>
<script>
var greeting= document.querySelector(".greeting");
greeting.innerHTML="Be a Part of Rotaract";

document.querySelector(".downit").style.display="none";
</script>


<?php 
include ( "./inc/footer.inc.php");?>