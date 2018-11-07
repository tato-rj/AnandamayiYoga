///////////
// IMAGE //
///////////

$('#upload-button').on('click', function() {
  $('input#image-input').click();
});

$('#upload-cover-button').on('click', function() {
  $('input#cover-input').click();
});

$('input#image-input, input#cover-input').change(function(event) {
  let target = $(this).attr('data-target');
  let file = event.target.files[0];
  let maxSize = 800000;

  if (file.name.match(/\.(jpg|jpeg|png)$/i)) {
    if (file.size < maxSize) {
      $(this).parent().find('button[type="submit"]').attr('disabled', false);
      $('.file-info-image').hide();
      readURL(this, target);
    } else {
      alert('This image is too large ('+formatBytes(file.size)+'). You can\'t upload images larger than 800 KB.');
    }
  } else {
    alert('This is not a valid image format. Only jpg, jpeg or png will be accepted.');
  }
});

///////////
// VIDEO //
///////////

$('input[type="file"].video').change(function(e){
    let file = e.target.files[0];
    let videoObject;
    let maxSize = 50000000;

    if (file.name.match(/\.(mp4|mpeg|ogg)$/i)) {
        if (file.size < maxSize) {
            let videoObject = URL.createObjectURL(file);
            $(this).closest('form').find('.video-object').attr('src', videoObject);
            $(this).siblings('label').text(file.name);
            $('#video-preview source')[0].src = videoObject;
            $('#video-preview')[0].load();
            $('#video-upload-button').show();
        } else {
            $(this).closest('form').find('.video-object').attr('src', null);
            $(this).siblings('label').text('Choose video');
            alert('You can continue, but we can\'t upload videos larger than 50 MB from here (this video has '+formatBytes(file.size)+'). The video will appear on the site only after you manually upload the video to Amazon S3.');
        }
    } else {
        $(this).closest('form').find('.video-object').attr('src', null);
        $(this).siblings('label').text('Choose video');
        alert('This is not a valid video format. Only mp4, mpeg or ogg will be accepted.');
    }
});