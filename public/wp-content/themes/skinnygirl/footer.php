<div id="s4" class="section">
				<div id="footer-wrapper">
					<div id="footer">
						<p class='about'>About us</p>
						<div id="info">
							 <?php $id=40; $post = get_page($id); echo $post->post_content;  ?>
						</div>

					</div>
					<div id="footer-t">
						<div style="max-width: 1024px; margin: 0px auto;">
							<img src="/wp-content/themes/skinnygirl/bethenny.png" />
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

				footer_h = $('#footer-wrapper').height();
				if(navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
					// margin = $('#footer-wrapper img').css('marginTop');
					// $('#footer-wrapper img').css('marginTop', parseInt(margin) + 10 + 'px');
				}
				if(window.mainPage == null) {
					// $('#s4').height($('#footer-wrapper #footer #info').height() + 180);
					if($(window).width() > 646)
						$('#footer-wrapper').height($('#footer-wrapper #footer #info').height() + 190);
				}
		});
		</script>
	</body>
</html>