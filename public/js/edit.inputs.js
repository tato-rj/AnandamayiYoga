///////////////////////////
// Edit inputs with AJAX //
///////////////////////////

$('.edit-control .edit').on(' click', function() {
  $inputId = $(this).attr('data-id');
  
  enableInput($inputId);
  enableMultiTypeFields(this);
  toggleButtons(this);
});

$('.edit-control .save').on(' click', function() {
  $(this).hide();
  $(this).siblings('.loading').show();
  $id = $(this).attr('data-id');
  $element = $('#'+$id);
  $path = $(this).attr('data-path');

  var data = new Object();
  data.key = $element.attr('name');
  data.value = getData($element);

  patch($path, data, $showNotification = true);
});

$('body').on('click', '.type-container button, .type-container a', function() {
  $(this).parent().remove();
});

////////////////////////////////////////////////////
// Reset inputs when click anywhere on the screen //
////////////////////////////////////////////////////

$(document).click(function(e) {
    if ($(e.target).closest('.edit-control, .type-container').length === 0) {
        disableAllInputs();
    }
});
