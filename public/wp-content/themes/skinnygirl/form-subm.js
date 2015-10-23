$(document).ready(function() {	
    $('#blog form.contact-form').submit(function(e) {
     	setTimeout(function() {
	    	if($('#blog form.contact-form input[type=submit]').val() == '✔ Subscribed') {
		    	$('p.sent-ok').css('display', 'block');
		    	$('p.sent-ok').text('You have successfully subscribed');
		    	setTimeout(function(){ window.location = '/'; }, 4500);
	    	}
		    else {
		    	$('p.sent-ok').css({display: 'block', color:'red'});
		    	$('p.sent-ok').text('Please fill in the required fields');
		    }
    	}, 800);
    });
});
