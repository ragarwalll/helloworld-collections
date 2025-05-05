$(document).ready(function() {

    $('.nav-toggle').click(function() {
      $('.hamburger').toggleClass('nav-open')
      $('nav').toggleClass('open')
      $('header').toggleClass('isopen')
      
    })
    
    $('.nav-toggle1').click(function() {
      $('.hamburger1').toggleClass('nav-open1')
      $('.index').toggleClass('show')
      
    })
    })