$('.delete').on('click', function() {
  path = $(this).attr('data-path');
  modal = $(this).attr('data-target');

  $(modal).find('form').attr('action', path);
});
