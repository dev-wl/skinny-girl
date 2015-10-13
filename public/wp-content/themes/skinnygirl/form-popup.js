$(document).ready(function() {
    $('#popup form.contact-form').submit(function(e) {
    	setTimeout(function() {
	    	if($('#popup form.contact-form input[type=submit]').val() == '✔ Subscribed') {
		    	$('p.sent-ok').css('display', 'block');
		    	$('p.sent-ok').text('You have successfully subscribed');
		    	setTimeout(function(){ window.location = '/'; }, 3000);
	    	}
		    else {
		    	$('p.sent-ok').css({display: 'block', color:'red'});
		    	$('p.sent-ok').text('Please fill in the required fields');
		    }
    	}, 2000);
    });
});
