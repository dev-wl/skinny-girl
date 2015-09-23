$(document).ready(function() {
    $('form.contact-form').submit(function() {
    	$('p.sent-ok').css('display', 'block');

    	setTimeout(function(){ window.location = '/'; }, 3000);
    });
});