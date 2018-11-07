captureImage = function(input, element) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $(element).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

captureVideo = function(file) {
	let videoObject = URL.createObjectURL(file);
    $('#video-preview source')[0].src = videoObject;
    $('#video-preview')[0].load();

    timer = setInterval(function(){
      if ($('#video-preview')[0].readyState > 0) {
        $('input[name="duration"]').val(Math.round($('#video-preview')[0].duration));
        $('#video-upload-button').show();
        clearInterval(timer);
      }
    },500);
}

resetVideo = function() {
  $('input[name="video"]').val(null);
	$('#video-preview source')[0].removeAttribute('src');
	$('#video-preview')[0].load();
	$('input[name="duration"]').val(null);
	$('#video-upload-button').hide();
}
