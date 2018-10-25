(function() {
  var createStorageKey, uploadUrl, removeUrl, uploadAttachment;

  Trix.config.attachments.preview.caption = {
    name: false,
    size: false
  };
  
  uploadUrl = '/articles/image/upload';
  removeUrl = '/articles/image/remove';

  document.addEventListener("trix-attachment-add", function(event) {
    var attachment;
    attachment = event.attachment;
    if (attachment.file) {
      return uploadAttachment(attachment);
    }
  });

  document.addEventListener("trix-attachment-remove", function(event) 
  {
    $.post(removeUrl, {'image_path': event.attachment.attachment.previewURL}, function(response){
      if(! response.passes) {
        console.log('The image has been removed.');
      } else {
        console.log('We were unable to remove this file.');
      }
    });
  });

  uploadAttachment = function(attachment) 
  {
    var file, id, form, key, xhr;

    id = article.id;
    file = attachment.file;
    form = new FormData;

    form.append("Content-Type", file.type);
    form.append("image", file);
    form.append("article_id", id);

    xhr = new XMLHttpRequest;
    xhr.open("POST", uploadUrl, true);

    xhr.upload.onprogress = function(event) {
      var progress;
      progress = event.loaded / event.total * 100;
      console.log('File uploaded!');
      return attachment.setUploadProgress(progress);
    };
    
    xhr.onload = function() {
      var href, url;
      
      if (xhr.status === 200) {
        url = href = xhr.response;

        return attachment.setAttributes({
          url: url,
          href: href
        });
      } else {
        console.log('Something went wrong...');
      }
    };
    return xhr.send(form);
  };

}).call(this);
