var username = document.querySelector(".user");
var line1 = document.querySelector(".line1");
var line2 = document.querySelector(".line2");
var pass = document.querySelector(".pass");

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

//pasword/username unclick
$(document).on("click", function(e) {
    if (($(e.target).is(username) === false) && ($(e.target).is(pass) === false)) {
      $(line1).removeClass("newline");
      $(line2).removeClass("newline");
      $(username).removeClass("usernameplacing");
      $(pass).removeClass("usernameplacing");
    }
  });



