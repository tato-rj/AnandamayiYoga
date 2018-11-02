<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        @include('layouts/favicon')

        <title>
        @auth
            @if(count($notifications) > 0)
            ({{limit(count($notifications))}})
            @endif
        @endauth
            {{config('app.name')}} | Admin
        </title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{asset('css/admin/vendor/material-design-iconic-font.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin/vendor/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin/vendor/jquery.scrollbar.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin/vendor/fullcalendar.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin/vendor/trix.css')}}">

        <!-- App styles -->
        <link href="{{ asset('css/admin/vendor/template.css') }}?version=3" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}?version=12" rel="stylesheet">
        
        <script>
            window.app = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        @yield('header')
    </head>

    <body data-ma-theme="green">
        
        <main class="main mb-4 pb-4">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            @include('admin/layouts/header')
            @include('admin/layouts/menu')

            <section class="content">
                @yield('content')
                {{-- @include('admin/layouts/footer') --}}
            </section>
        </main>

        @include('admin/components/sounds')

        @include('layouts/partials/alerts')
    
        @include('components/snippets/spinners/full-screen')
        
        <!-- Javascript -->
        <!-- Vendors -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{asset('js/admin/vendor/jquery.scrollbar.min.js')}}"></script>
        <script src="{{asset('js/admin/vendor/jquery-scrollLock.min.js')}}"></script>

        <script src="{{asset('js/admin/vendor/salvattore.min.js')}}"></script>
        <script src="{{asset('js/admin/vendor/moment.min.js')}}"></script>

        <!-- App functions and actions -->
        <script src="{{asset('js/admin/vendor/sortable.min.js')}}"></script>
        <script src="{{asset('js/admin/vendor/template.min.js')}}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

        <script type="text/javascript">
        $('form').each(function() {
            $(this).validate();
        });

        $('.video-object').on('canplaythrough', function(e) {
          var duration = 0; 
          duration = Math.round(e.currentTarget.duration);
          console.log('Video duration: '+duration+' sec.')
          $(this).closest('form').find('input[name="duration"]').val(duration);
        }); 

        $('input[type="file"].video').change(function(e){
            var file = e.target.files[0];
            var videoObject; 
            $infoContainer = $(this).parent().siblings('.file-info');
  
            if (file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)) { 
                videoObject = URL.createObjectURL(file);
                $(this).closest('form').find('.video-object').attr('src', videoObject); 
            } 

            $('.custom-file-label').text(file.name);
            $infoContainer.find('.size').text(formatBytes(file.size));
            $infoContainer.show();
        });

        $('input[type="file"]#image-input, input[type="file"]#cover-input').change(function(e){
            var file = e.target.files[0];
            $infoContainer = $(this).parent().siblings('.file-info');

            if (file.size > 800000) {
                $infoContainer.find('.warning .size').text(formatBytes(file.size));
                $('.warning').show();
                $('.success').hide();
                $infoContainer.show();
            } else {
                $infoContainer.find('.success .size').text(formatBytes(file.size));
                $('.warning').hide();
                $('.success').show();
                $infoContainer.show();
            }
        });
        </script>

        <script type="text/javascript">

        Trix.config.textAttributes.sup = { tagName: "sup", inheritable: true }
        Trix.config.textAttributes.sub = { tagName: "sub", inheritable: true }
        Trix.config.textAttributes.small = { tagName: "small", inheritable: true }

        addEventListener("trix-initialize", function(event) {
          var buttonHTML, buttonGroup
          
          buttonHTML  = '<button type="button" class="trix-button" data-trix-attribute="sup"><i class="fas fa-superscript fa-lg mb-1"></i></button>'
          buttonHTML += '<button type="button" class="trix-button" data-trix-attribute="sub"><i class="fas fa-subscript fa-lg mt-1"></i></button>'
          buttonHTML += '<button type="button" class="trix-button" data-trix-attribute="small"><i class="fas fa-search-minus"></i></button>'

          buttonGroup = event.target.toolbarElement.querySelector('span[data-trix-button-group="block-tools"]')
          buttonGroup.insertAdjacentHTML("beforeend", buttonHTML)
        });

        </script>

        @yield('scripts')
    </body>
</html>