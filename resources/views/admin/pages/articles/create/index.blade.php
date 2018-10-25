@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'Create a new article'])
  @slot('subtitle')
    <a href="/office/articles" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all articles</a>
  @endslot
@endcomponent

<div class="row">
  <form method="POST" id="create-article" class="p-4 row" action="/office/articles" enctype="multipart/form-data">
    {{csrf_field()}}
    
    @include('admin/pages/articles/create/left-column')
    @include('admin/pages/articles/create/right-column')

  </form>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/upload.image.js')}}"></script>

<script type="text/javascript">
checkName('articles');
</script>

<script type="text/javascript">
// (function() {
//   var createStorageKey, host, uploadAttachment;

//   Trix.config.attachments.preview.caption = {
//     name: false,
//     size: false
//   };

//   document.addEventListener("trix-attachment-add", function(event) {
//     var attachment;
//     attachment = event.attachment;
//     if (attachment.file) {
//       return uploadAttachment(attachment);
//     }
//   });

//   host = "https://d13txem1unpe48.cloudfront.net/";

//   uploadAttachment = function(attachment) {
//     var file, form, key, xhr;
//     file = attachment.file;
//     key = createStorageKey(file);
//     form = new FormData;
//     form.append("key", key);
//     form.append("Content-Type", file.type);
//     form.append("file", file);
//     xhr = new XMLHttpRequest;
//     xhr.open("POST", host, true);

//     xhr.upload.onprogress = function(event) {
//       var progress;
//       progress = event.loaded / event.total * 100;
//       console.log('File uploaded!');
//       return attachment.setUploadProgress(progress);
//     };
    
//     xhr.onload = function() {
//       var href, url;
//       if (xhr.status === 204) {
//         url = href = host + key;
//         console.log(url);
//         return attachment.setAttributes({
//           url: url,
//           href: href
//         });
//       } else {
//       	console.log('Something went wrong...');
//       }
//     };
//     return xhr.send(form);
//   };

//   createStorageKey = function(file) {
//     var date, day, time;
//     date = new Date();
//     day = date.toISOString().slice(0, 10);
//     time = date.getTime();
//     console.log(file.name);
//     return "tmp/" + day + "/" + time + "-" + file.name;
//   };

// }).call(this);
</script>
@endsection