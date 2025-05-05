var fname = document.querySelector(".user");
var line1 = document.querySelector(".user1");

var lname = document.querySelector(".lname");
var line2 = document.querySelector(".user2");

var mail = document.querySelector(".mail");
var line3 = document.querySelector(".user3");

var namee = document.querySelector(".name");
var line4 = document.querySelector(".user4");

var pass = document.querySelector(".pass");
var line5 = document.querySelector(".user5");

fname.addEventListener("click", Item1);
function Item1(){
    line1.classList.add("newline")
    fname.classList.add("usernameplacing")
}

lname.addEventListener("click", Item2);
function Item2(){
    line2.classList.add("newline")
    lname.classList.add("usernameplacing")
}

mail.addEventListener("click", Item3);
function Item3(){
    line3.classList.add("newline")
    mail.classList.add("usernameplacing")
}

namee.addEventListener("click", Item4);
function Item4(){
    line4.classList.add("newline")
    namee.classList.add("usernameplacing")
}

pass.addEventListener("click", Item5);
function Item5(){
    line5.classList.add("newline")
    pass.classList.add("usernameplacing")
}

//pasword/username unclick
$(document).on("click", function(e) {
    if (($(e.target).is(fname) === false) && ($(e.target).is(lname) === false)) {
        if((($(e.target).is(mail) === false)) && ($(e.target).is(namee) === false)){
            if(($(e.target).is(pass) === false)){
                $(line1).removeClass("newline");
                $(line2).removeClass("newline");
                $(line3).removeClass("newline");
                $(line4).removeClass("newline");
                $(line5).removeClass("newline");
                
                $(fname).removeClass("usernameplacing");
                $(lname).removeClass("usernameplacing");
                $(mail).removeClass("usernameplacing");
                $(namee).removeClass("usernameplacing");
                $(pass).removeClass("usernameplacing");
            }
        }
    }
  });



