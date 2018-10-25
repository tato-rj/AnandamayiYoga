var autoSortable = function(container, callback = true) {
  $container = container;

  $container.sortable({
    handle: '.sort-handle',
    update: function() {
      if (callback) {
        $(this).parent().find('.ordered').each(function() {
          reorder($(this));
        });
      }
    }
  });
}

var createDraggable = function(isEnabled = 'enable')
{
  $("#sortable-all").sortable({
    connectWith: ".connectedSortable",
    receive: function(event, element) {
      putItem(element);
    }
  }).disableSelection();

  $("#sortable-selections").sortable({
    connectWith: ".connectedSortable",
    receive: function(event, element) {
      putItem(element);
    },
    update: function() {
      $('#sortable-selections').find('.ordered').each(function() {
        reorder($(this), showNotification = false);
      });     
    }
  }).disableSelection();

  $("#sortable-all, #sortable-selections" ).sortable(isEnabled);
}

var putItem = function(element) {
  $originalContainer = $(element.sender);
  $element = $(element.item);
  $input = $element.find('input');

  if ($originalContainer.attr('id') == 'sortable-all') {
    $input.attr('name', $element.attr('data-name'));
    $input.attr('type', 'checkbox');
  } else {
    $input.removeAttr('name');
    $input.removeAttr('type');
  }
}

var reorder = function(element, showNotification = true) {
  $element = element;

  $path = $element.attr('data-path');
  $value = $element.parent().children().index($element);

  patch($path, {'key': 'order', 'value': $value}, showNotification);
}