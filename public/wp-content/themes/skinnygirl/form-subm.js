$(document).ready(function() {	
    $('#blog form.contact-form').submit(function(e) {
     	setTimeout(function() {
     		if(navigator.userAgent.toLowerCase().indexOf('safari') > -1) {
     			var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
     			ui = $('form.contact-form input[type="email"]')[1];
     			ui = $(ui).val();
				if(pattern.test(ui)) {
					window.stop();
					$('p.sent-ok').css('display', 'block');
					$('p.sent-ok').text('You have successfully subscribed');
					setTimeout(function(){ window.location = '/'; }, 2500);
				}
     		}
     		if (navigator.userAgent.match(/iPad/i) != null) {
     			var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
     			ui = $('form.contact-form input[type="email"]')[1];
     			ui = $(ui).val();
				if(ui == '' || pattern.test(ui)) {
					$('p.sent-ok').css({display: 'block', color:'red'});
			    	$('p.sent-ok').text('Please fill in the required fields');
				}
     		}
	    	else if($('#blog form.contact-form input[type=submit]').val() == '✔ Subscribed') {
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
