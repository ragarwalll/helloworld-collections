var username = document.querySelector(".name");
var age = document.querySelector(".age");
var line1 = document.querySelector(".lineName");
var line2 = document.querySelector(".lineAge");

username.addEventListener("click", activateName);
function activateName() {
    line1.classList.add("linefull")
    username.classList.add("placing");
}

age.addEventListener("click", activateAge);
function activateAge() {
    line2.classList.add("linefull");
    age.classList.add("placing");
}
$(document).on("click", function(e) {
    if (($(e.target).is(username) === false) && ($(e.target).is(age) === false)) {
        $(line1).removeClass("linefull");
        $(line2).removeClass("linefull");
        username.classList.remove("placing");
        age.classList.remove("placing");
    }
});

