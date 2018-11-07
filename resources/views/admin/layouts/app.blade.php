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
        <link href="{{ asset('css/admin/vendor/template.css') }}" rel="stylesheet">
        <link href="{{asset('css/primer.css') }}" rel="stylesheet">
        <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
        
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
            @include('admin/layouts/menu/layout')

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
        <script src="{{ asset('js/admin.js') }}"></script>
        <script src="{{asset('js/admin/vendor/jquery.scrollbar.min.js')}}"></script>
        <script src="{{asset('js/admin/vendor/jquery-scrollLock.min.js')}}"></script>

        <script src="{{asset('js/admin/vendor/salvattore.min.js')}}"></script>
        <script src="{{asset('js/admin/vendor/moment.min.js')}}"></script>

        <!-- App functions and actions -->
        <script src="{{asset('js/admin/vendor/sortable.min.js')}}"></script>
        <script src="{{asset('js/admin/vendor/template.min.js')}}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

        <script type="text/javascript">
        $('#input-lang button').on('click', function() {
            $thisButton = $(this);
            thisTarget = $thisButton.attr('data-target');
            $otherButton = $thisButton.siblings('button');
            otherTarget = $otherButton.attr('data-target');

            $('#input-lang button[data-target="'+thisTarget+'"]').removeClass('btn-light').addClass('btn-secondary');
            $('#input-lang button[data-target="'+otherTarget+'"]').addClass('btn-light').removeClass('btn-secondary');

            $(thisTarget).show();
            $(otherTarget).hide();
        });
        </script>

        <script type="text/javascript">
        $('form').each(function() {
            $(this).validate();
        });

        $('.video-object').on('canplaythrough', function(e) {
          let duration = 0; 
          duration = Math.round(e.currentTarget.duration);
          console.log('Video duration: '+duration+' sec.')
          $(this).closest('form').find('input[name="duration"]').val(duration);
        }); 
        </script>

        <script type="text/javascript">

        Trix.config.textAttributes.sup = { tagName: "sup", inheritable: true }
        Trix.config.textAttributes.sub = { tagName: "sub", inheritable: true }
        Trix.config.textAttributes.small = { tagName: "small", inheritable: true }

        addEventListener("trix-initialize", function(event) {
          let buttonHTML, buttonGroup
          
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