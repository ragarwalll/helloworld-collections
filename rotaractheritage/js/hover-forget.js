var username = document.querySelector(".user");
var line = document.querySelector(".line");

var final = document.querySelector(".final");
var nextBtn = document.querySelector(".next");
var user_status = document.querySelector(".email_status");


username.addEventListener("click", activateItem);

//username click
function activateItem(){
    line.classList.add("newline")
    username.classList.add("usernameplacing")
}

//pasword/username unclick
$(document).on("click", function(e) {
    if (($(e.target).is(username) === false)) {
      $(line).removeClass("newline");
      $(username).removeClass("usernameplacing");
    }
  });



