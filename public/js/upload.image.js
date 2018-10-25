$('#upload-button').on('click', function() {	
  $('input#image-input').click();
});

$('#upload-cover-button').on('click', function() {
  $('input#cover-input').click();
});

function readURL(input, element) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $(element).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$('input#image-input').change(function() {
	$('#submit-file').attr('disabled', false);
 	readURL(this, '#image');
});

$('input#cover-input').change(function() {
  $('#submit-cover-file').attr('disabled', false);
  readURL(this, '#cover');
});
