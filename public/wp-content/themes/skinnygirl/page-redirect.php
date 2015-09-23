<?php get_header();?>

<?php
	$link = $_GET['link'];
?>
<div id="redirect">
	<div id="blog" style="margin-top:-2px;">
		<div class="content">
		<p>You are going to be redirected to <?php echo $link; ?> site</p>
		</div>
	</div>
</div>
</div>

<script>

	$('.global-wrapper').css('position', 'static');
	
	$('#menu-wrapper').remove();

	setTimeout(function() {
		window.location.href = '<?php echo $link;?>';
	}, 5);
	
</script>
</body>
</html>