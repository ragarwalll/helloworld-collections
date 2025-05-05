$('.answer').hide();

$('.question').click(function(){
    $(this).next().next().fadeIn();
});