var video = videojs('preview-video').ready(function(){
	var player = this;
	
	$('#show-preview').on('click', function() {
		$(this).parent().hide();
		$('#preview-container').show(function() {
			player.play();
		});
	});

	player.on('ended', function() {

	});
});