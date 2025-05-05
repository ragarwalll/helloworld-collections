var left = document.querySelector('.carousel-left');
var right = document.querySelector('.carousel-right');
var left1 = document.querySelector('.left-home');
var right1 = document.querySelector('.right-home');
var totalSlides = document.querySelectorAll('.items-index .item').length;
var slides = document.querySelectorAll('.items-index .item');
var mainSlide = document.querySelector('.items-index');
var curSlide = 0;
var tempSlide;
var working = false;
var marker = document.querySelector('.marker-container');
var circle = document.querySelectorAll('.marker-container .outer-circle');

left.addEventListener('click', previousItem);
right.addEventListener('click', nextItem);

left1.addEventListener('click', previousItem);
right1.addEventListener('click', nextItem);

function initial() {
	slides[0].classList.add('active');
	for (var i = 0; i < totalSlides; i++) {
		slides[i].classList.add('item' + i);
		slides[i].style.left = 50 * i + '%';
		marker.innerHTML += "<div class='outer-circle' id='" + (i + 1) + "'>\n<div class='inner-circle'></div>\n\n";
	}
	var t = 0; // the height of the highest element (after the function runs)
	var t_elem; // the highest element (after the function runs)
	$('*', slides).each(function() {
		$this = $(this);
		if ($this.outerHeight() > t) {
			t_elem = this;
			t = $this.outerHeight();
		}
	});
	mainSlide.style.height = t + 'px';
}
window.setInterval(function() {
	var t = 0; // the height of the highest element (after the function runs)
	var t_elem; // the highest element (after the function runs)
	$('*', slides).each(function() {
		$this = $(this);
		if ($this.outerHeight() > t) {
			t_elem = this;
			t = $this.outerHeight();
		}
	});
	mainSlide.style.height = t + 'px';
	//left.style.height = t + "px";
	//right.style.height = t + "px";
}, 2000);

initial();
var circle = document.querySelectorAll('.marker-container .outer-circle');
circle[0].classList.add('active-circle');
for (var j = 0; j < totalSlides; j++) {
	circle[j].addEventListener('click', changeItem);
}

function previousItem(change) {
	var active = document.querySelector('.items-index .active');
	var activeCircle = document.querySelector('.marker-container .active-circle');
	var current = parseInt(document.querySelector('.marker-container .active-circle').getAttribute('id'));
	if (typeof change != 'number') {
		change = 1;
	}
	try {
		active.classList.remove('active');
		activeCircle.classList.remove('active-circle');

		slides[current - change - 1].classList.add('active');
		circle[current - change - 1].classList.add('active-circle');

		curSlide = curSlide - change;
		mainSlide.style.transform = 'translate3d(' + -curSlide * 50 + '%,0,0)';
	} catch (e) {
		slides[0].classList.add('active');
		circle[0].classList.add('active-circle');
	}
}

function nextItem(change) {
	var active = document.querySelector('.items-index .active');
	var activeCircle = document.querySelector('.marker-container .active-circle');
	var current = parseInt(document.querySelector('.marker-container .active-circle').getAttribute('id'));
	if (typeof change != 'number') {
		change = 1;
	}
	try {
		active.classList.remove('active');
		activeCircle.classList.remove('active-circle');

		slides[current + change - 1].classList.add('active');
		circle[current + change - 1].classList.add('active-circle');

		curSlide = curSlide + change;

		mainSlide.style.transform = 'translate3d(' + -curSlide * 50 + '%,0,0)';
	} catch (e) {
		slides[totalSlides - 1].classList.add('active');
		circle[totalSlides - 1].classList.add('active-circle');
	}
}

function changeItem() {
	var current = document.querySelector('.marker-container .active-circle').getAttribute('id');
	var clicked = this.getAttribute('id');

	var active = document.querySelector('.items-index .active');
	var activeCircle = document.querySelector('.marker-container .active-circle');
	if (current < clicked) {
		var diff = clicked - current;

		nextItem(diff);
	}
	if (current > clicked) {
		var diff = current - clicked;
		previousItem(diff);
	}
}
/*
$(document).on("mousedown touchstart", ".items-index", function(e) {
    var startX = e.pageX ,
    winW = $(window).width();
    temp=0;
    
    $(document).on("mousemove touchmove", function(e) {
        var x = e.pageX;
        //console.log(startX);
        if(temp == 0){
        if(startX > x){
            nextItem();
            temp=1;
        }
        if(startX < x){
            previousItem();
            temp=1;
        }
    }
     
    });
});

$(document).on("mouseup touchend", function(e) {
    $(document).off("mousemove touchmove");
    temp=1;
    
});*/
temp = 0;
window.setInterval(repeat, 2000);

function repeat() {
	if (curSlide == totalSlides - 1) {
		temp = 1;
	}
	if (curSlide == 0) {
		temp = 0;
	}
	if (temp == 0) {
		nextItem();
	}
	if (temp == 1) {
		previousItem();
	}
}
