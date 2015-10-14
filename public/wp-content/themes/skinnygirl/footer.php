<div id="s4" class="section">
				<div id="footer-wrapper">
					<div id="footer">
						<!--<p class='about'>About us</p>-->
						<div id="info">
							 <?php $id=40; $post = get_page($id); echo $post->post_content;  ?>
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
				$('#s4').height(63);


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
						$('#footer-wrapper').height($('#footer-wrapper #footer #info').height() + 106);
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
		});
		</script>
	</body>
</html>
