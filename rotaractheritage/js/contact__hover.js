var username = document.querySelector(".contact__input");
var line1 = document.querySelector(".contact__line1");
var line2 = document.querySelector(".contact__line2");
var line3 = document.querySelector(".contact__line3");
var pass = document.querySelector(".contact__email");
var mess = document.querySelector(".contact__message");

username.addEventListener("click", activateItem);

//username click
function activateItem(){
    line1.classList.add("newline")
    username.classList.add("usernameplacing")
} 

//password click
pass.addEventListener("click", activateItem1);
function activateItem1(){
    line2.classList.add("newline")
    pass.classList.add("usernameplacing")
}

mess.addEventListener("click", activateItem2);
function activateItem2(){
    line3.classList.add("newline")
    mess.classList.add("usernameplacing")
}


//pasword/username unclick
$(document).on("click", function(e) {
    if (($(e.target).is(username) === false) && ($(e.target).is(pass) === false) && ($(e.target).is(mess) === false)) {
      $(line1).removeClass("newline");
      $(line2).removeClass("newline");
      $(line3).removeClass("newline");
      $(username).removeClass("usernameplacing");
      $(pass).removeClass("usernameplacing");
      $(mess).removeClass("usernameplacing");
    }
  });



