@extends('layouts/app')

@section('content')
<div class="container-fluid">
    @include('components/sections/lead', ['image' => 'contact'])
    @include('pages/user/settings/profile/content')
</div>
@endsection

@section('scripts')

<script type="text/javascript">

function toggleControls(element)
{
  $container = (element) ? element.closest('.controls') : $('.controls');
  $container.find('> div').toggleClass('d-flex').toggle();
  $container.find('> button').toggle();
  $container.siblings('input, select').toggleAttr('disabled');
}

function resetControls()
{
  $container = $('.controls');
  $container.find('> div').removeClass('d-flex').hide();
  $container.find('> button').show();
  $container.siblings('input, select').attr('disabled', true);
}



$('button[name="edit"], button[name="cancel"]').on('click', function() {
  toggleControls($(this));
});

$('button[name="save"]').on('click', function() {
  $container = $(this).parent().parent();
  $input = $container.siblings('input');

  if (!$input.length) {
    $input = $container.siblings('select');
  }
  
  var data = {};
  data[$input.attr('name')] = $input.val();

  $.post('/users', data, function(message, status, error){
      showAlert('success', message);
      resetControls();
  }).fail(function(request, status, error) {
      var response = JSON.parse(request.responseText);
      showAlert('danger', response['errors']);
  });
});
</script>

<script type="text/javascript">
$('#select-button').on('click', function() {
  $('input#avatar').click();
});

window.addEventListener('DOMContentLoaded', function () {
  var avatar = document.getElementById('avatar-final');
  var image = document.getElementById('avatar-to-crop');
  var input = document.getElementById('avatar');
  var $uploadButton = $('#upload-button');
  var $progress = $('.progress');
  var $progressBar = $('.progress-bar');
  var $alert = $('.alert');
  var $modal = $('#crop-container');
  var cropper;
  $('[data-toggle="tooltip"]').tooltip();

  // When user clicks the upload button and selects an image...
  input.addEventListener('change', function (e) {
    var files = e.target.files;
    var done = function (url) {
      input.value = '';
      image.src = url;
      $alert.hide();
      $modal.modal('show');
    };
    var reader;
    var file;
    var url;
    
    if (files && files.length > 0) {
      file = files[0];
      if (URL) {
        done(URL.createObjectURL(file));
      } else if (FileReader) {
        reader = new FileReader();
        reader.onload = function (e) {
          done(reader.result);
        };
        reader.readAsDataURL(file);
      }
    }
  });

  // When crop modal opens...
  $modal.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
      aspectRatio: 1,
      viewMode: 3,
    });
    // When crop modal closes...
  }).on('hidden.bs.modal', function () {
    cropper.destroy();
    cropper = null;
  });
  // When CROP button is clicked...
  document.getElementById('crop').addEventListener('click', function () {
    var initialAvatarURL;
    var canvas;
    $modal.modal('hide');
    if (cropper) {
      canvas = cropper.getCroppedCanvas({
        width: 400,
        height: 400,
      });
      initialAvatarURL = avatar.src;
      avatar.src = canvas.toDataURL();
      
      $uploadButton.attr('disabled', false);
      canvas.toBlob(function (blob) {
        var formData = new FormData();
        formData.append('avatar', blob);

        $uploadButton.on('click', function() {
          $progress.show();
          $.ajax('/users/avatar', {
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: function () {
              var xhr = new XMLHttpRequest();
              xhr.upload.onprogress = function (e) {
                var percent = '0';
                var percentage = '0%';
                if (e.lengthComputable) {
                  percent = Math.round((e.loaded / e.total) * 100);
                  percentage = percent + '%';
                  $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                }
              };
              return xhr;
            },
            success: function () {
            	$('.nav-item .avatar').css({
            		'background-image': "url("+avatar.src+")"
            	});
            },
            error: function (request, status, error) {
              avatar.src = initialAvatarURL;
              var response = JSON.parse(request.responseText);
              showAlert('danger', response['errors']);
            },
            complete: function () {
            	setTimeout(function() {
                  $progress.remove(); 
  				$('#upload-box .card-body > button').remove();
  				$('#upload-box .card-body > div').show();     		
            	}, 500);

            },
          });
        });
      });
    }
  });
});
</script>
@endsection