<div id="s4" class="section">
				<div id="footer-wrapper">
					<div id="footer">
						<!--<p class='about'>About us</p>-->
						<div id="info">
							 <?php $id=40; $post = get_page($id); echo $post->post_content;  ?>
							 <a class="twitter-timeline"  href="https://twitter.com/Skinnygirl_tea" data-widget-id="644784352090550272">Tweets by @Skinnygirl_tea</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						
							<?php echo do_shortcode('[facebook-feed]'); ?> <div class="clearfix"></div>
						</div>

					</div>
					<div id="footer-t">
						<div style="max-width: 1024px; margin: 0px auto;">
							<!--<img src="/wp-content/themes/skinnygirl/bethenny.png" />-->
							<div id="bottom-footer">
								<p><?php $id=135; $post = get_page($id); echo $post->post_content;  ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="h4"></div>
		</div>

		<script>
			infoHeight = $('#footer-wrapper #footer #info').height();

			$(window).on('load', function() {
				h = $('#footer-wrapper #footer #info').height();
				// $('#s4').height(63);
				// $('#s4').height(350);
				$('#s4').height(383);


				if(mobile && window.mainPage != null) {
					if($(window).height() > $(window).width() && $(window).height() > 500) { //portrait
						$('#footer-wrapper').height(103);
					}
				}

				footer_h = $('#footer-wrapper').height();
				if(navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
					// margin = $('#footer-wrapper img').css('marginTop');
					// $('#footer-wrapper img').css('marginTop', parseInt(margin) + 10 + 'px');
				}
				if(window.mainPage == null) {
					hw = $('#head-wrapper').height();
					bw = $('#blog').height();
					mw = $('#menu-wrapper').height();
					sh = $('.share').height();
					if(hw+mw+bw+sh < $(window).height() - 100 && $(window).width() > 400) {
						// $('#s4').css({position:'absolute', bottom:61, width:'100%'});
					}

					// $('#s4').height($('#footer-wrapper #footer #info').height() + 180);
					if($(window).width() > 646)
						$('#footer-wrapper').height($('#footer-wrapper #footer #info').height() + 94);
				}


				if( getCookie("popup") == null) {
					setTimeout(function() {
						$('#darkener, #popup_wrap').css('display', 'block');

						var date = new Date();
						var minutes = 120;
						date.setTime(date.getTime() + (minutes * 60 * 1000));
						
						setCookie("popup", "skinnygirls", {
				     	 expires: date,
				     	 path: '/',
				    	});

					}, 1000);
				}
			

			$('.popup-close').click(function() {
				$('#darkener').css('display', 'none');
				$('#popup').css('display', 'none');
			});

			div = '<div class="fb-feed"><h1 class="summary"><a class="customisable-highlight">Facebook feed</a></h1> <a class="follow" href="http://fb.com/skinnygirlcoffeeandteas">Facebook</a> <div class="clearfix"></div> </div>';
			$(div).prependTo('#wff-id');
			div2 = '<div class="fb-feed bottom"><span><a href="http://fb.com/skinnygirlcoffeeandteas">Read more on facebook</a></span></div>';
			$(div2).insertAfter('.fb-feed');
			$('.fb-feed').width($('#wff-id').width() + 15);
			$('.wff-fb-item:nth-child(3)').css('padding-top', '50px');

			$('.fb-feed.bottom').css('margin-top', $('.wff-feed-wrapper').height() - 35 + 'px')

			// $('#twitter-widget-0').attr('name', 'twitter-widget-0');

			// var divNode = document.createElement("style");
			// divNode.innerHTML = ".customisable, .customisable:link, button.customisable, a:hover b, a:link, a:visited, .customisable:hover,  a:focus b, i.ic-sum.ic-mask { color: #d13139; } a:hover .ic-mask, a:focus .ic-mask {background-color: #d13139;}";
			// document.body.appendChild(divNode);

			// if(navigator.userAgent.toLowerCase().indexOf('chrome') > -1)
			// 	frames['twitter-widget-0'].contentWindow.document.body.appendChild(divNode);
			// else
				// frames['twitter-widget-0'].document.body.appendChild(divNode);
		});

		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-49590367-2', 'auto');
		ga('send', 'pageview');
		</script>
	</body>
</html>
