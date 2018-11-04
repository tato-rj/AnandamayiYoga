getCookie = function(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
}

setCookie = function(cname, cvalue, exdays) {
  var expires;
  
  if (exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    expires = "expires="+d.toUTCString();
  }
  
  document.cookie = cname + "=" + cvalue + ";" + expires;
}

submitFeedback = function(url, data) {
    $.post(url, data, 
      function(response){
      if(response.passes) {
        console.log('Your feedback has been received.');
      } else {
        console.log('We couldn\'t save your feedback right now.');
      }
    });
}

isBreakPoint = function (bp) {
    var bps = [576, 768, 992, 1200],
        w = $(window).width(),
        min, max
    for (var i = 0, l = bps.length; i < l; i++) {
      if (bps[i] === bp) {
        min = bps[i-1] || 0
        max = bps[i]
        break
      }
    }
    return w > min && w <= max
}

checkName = function(model) {
  $('input[name="name"]').on('blur', function() {
    $name = $(this).val();
    $message = $('#validate-name');

    $.post("/admin/"+model+"/validate", {'name': $name}, function(response){
      if(! response.passes) {
        $message.show();
      } else {
        $message.hide();
      }
    });
  });
}

updateButton = function(button, disabled, text) {
  $spinner = button.find('.spinner');
  $label = button.find('.label');

  button.attr('disabled', disabled);
  (disabled) ? $spinner.show() : $spinner.hide();

  if (text)
    $label.text(text);
}

jQuery.fn.extend({
  disableOnClick: function() {
    $button = $(this);

    $button.on('click', function (e) {
      $button.closest('form').submit();

      if ($('label.error').text() == '') {
        updateButton($button, disabled = true);
      }
    });
  },

  blockScreenOnClick: function() {
    $button = $(this);

    $button.on('click', function (e) {
      $button.closest('form').submit();

      if ($('label.error').text() == '') {
        $('#full-screen-spinner').fadeIn('fast');
      }
    });
  },

  hasAttr: function(name) {
    var attr = $(this).attr(name);
    return (typeof attr !== typeof undefined && attr !== false);   
  }
});

patch = function(address, data, showNotification = false, method = 'PATCH')
{
  $.ajax({
    url: address,
    method: method,
    data: data,
    success: function(message) {
      console.log(message);
      if (showNotification) {
        showAlert('success', message);
        disableAllInputs();
      }
    },
    fail: function(request, status, error) {
      alert(error);
    }
  });
}

getData = function(element)
{
  var data = [];

  if (element.has('div[data-lang="en"]').length) {
    let fields = new Object();
    fields.en = [];
    fields.pt = [];

    $element.find('div[data-lang="en"]:not(:first)').each(function() {
      fields.en.push($(this).find('input').val());
    });
    $element.find('div[data-lang="pt"]:not(:first)').each(function() {
      fields.pt.push($(this).find('input').val());
    });

    return fields;
  }

  if (element.has('input[type="checkbox"]').length) {
    element.find('input:checked').each(function() {
        data.push($(this).val());
    });      
  }

  if (element.has('input[type="radio"]').length) {
    data = element.find('input:checked').val();
  }

  if (element.has('input[type="text"], input[type="range"]').length) {
    data = element.find('input').val();
  }

  if (element.has('trix-editor').length) {
    data = element.find('input[bind="trix"]').val();
  }

  if (element.has('.type-container').length) {
    element.find('textarea:visible').each(function() {
      if ($(this).val() != '')
        data.push($(this).val());
      });
    } else if (element.has('textarea').length) {
      data = element.find('textarea').val();
  }

  if (element.has('select').length) {
    if (element.find('select').prop('multiple')) {
      element.find('select option:selected').each(function() {
        data.push($(this).val());
      });
    } else {
      data = element.find('select option:selected').val();
    }
  }

  return data;
}

enableInput = function(inputId)
{
  disableAllInputs();

  $container = $('#'+$inputId);

  $container.find('input, textarea, select').each(function() {
    $(this).attr('disabled', false);
  });
  
  if ($container.has('#sortable-all').length) {
    $("#sortable-all, #sortable-selections" ).sortable('enable');
  }

  if ($container.has('trix-editor').length) {
    $('trix-editor').removeClass('trix-disabled');
  }
}

enableMultiTypeFields = function(element)
{
  $('.add-field').hide();
  $(element).parent().parent().siblings('.add-field').show();
  $(element).parent().parent().siblings('.type-container').find('button').show();
}

disableAllInputs = function()
{
  $('.edit-control input, .edit-control textarea, .edit-control select').attr('disabled', true);
  $("#sortable-all, #sortable-selections").sortable('disable');
  $('.edit-control .save, .edit-control .loading').hide().siblings('.edit').show();
  $('.add-field').hide();
  $('.type-container button').hide();
  $('trix-editor').addClass('trix-disabled');
}

toggleButtons = function(button)
{
  $(button).toggle().siblings('.edit, .save').toggle();
}

showAlert = function(type, message)
{
  if ($('.alert-temp').length)
    return;
  
  $alert = $('#alert-'+type+'-original').clone().addClass('alert-temp');
  $alert.appendTo('body');

  if (type == 'success') {
    $alert.find('.message').text(message);
  } else {
    $.each(message, function(index, value) {
        $alert.find('.message').append('<li>'+value+'</li>');
    }); 
  }

  $alert.show(); 
}

createSortable = function(isEnabled = 'enable')
{
  $("#sortable-all, #sortable-selections").sortable({
    connectWith: ".connectedSortable",
    receive: function(event, element) {
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
  }).disableSelection();

  $("#sortable-all, #sortable-selections" ).sortable(isEnabled);
}

formatBytes = function(bytes,decimals) {
   if(bytes == 0) return '0 Bytes';
   var k = 1024,
       dm = decimals || 2,
       sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
       i = Math.floor(Math.log(bytes) / Math.log(k));
   return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}