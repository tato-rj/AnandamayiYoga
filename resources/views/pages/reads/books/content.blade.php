<section id="scroll-mark" class="container py-4">
    <div class="row my-3">
    	
        @include('components/sections/title', [
            'title' => 'Reads',
            'subtitle' => 'Browse through our collection of articles and books'])

        @include('pages/reads/menu', ['books' => 'btn-red'])

    	<div class="col-lg-10 col-md-12 col-sm-12 col-12 mx-auto">
    		{{-- Livros --}}
            @component('pages/reads/books/show')
                @slot('book')saudacao_do_sol
                @endslot
                @slot('page')page
                @endslot
                @slot('paragraph_1')
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
                @endslot
                @slot('paragraph_2')
                <p>Aenean rhoncus a arcu id mollis. Proin vitae congue neque, vel porttitor est. Integer vitae turpis pharetra, luctus turpis ut, mollis diam. Fusce ultrices mi nunc, vitae dignissim orci imperdiet quis.</p>
                @endslot
                @slot('paragraph_3')
                <p>"Sed id neque arcu. Pellentesque dictum vitae purus non consequat. In at dictum augue. Vestibulum sed enim sem. Aenean eu dui vulputate, laoreet diam quis, fermentum velit. Aenean at mauris ultrices, posuere enim quis, congue turpis. Quisque iaculis tempor turpis convallis ultricies. Donec quis egestas nulla. Nulla vitae egestas quam. Praesent id est augue. Duis sodales laoreet augue ac interdum. Phasellus scelerisque orci metus, hendrerit sagittis orci feugiat vel."
                <span class="blockquote-footer text-right">Quote source here</span></p>
                @endslot
            @endcomponent

            @component('pages/reads/books/show')
                @slot('book')saudacao_da_lua
                @endslot
                @slot('page')page
                @endslot
                @slot('paragraph_1')
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
                @endslot
                @slot('paragraph_2')
                <p>Aenean rhoncus a arcu id mollis. Proin vitae congue neque, vel porttitor est. Integer vitae turpis pharetra, luctus turpis ut, mollis diam. Fusce ultrices mi nunc, vitae dignissim orci imperdiet quis.</p>
                @endslot
                @slot('paragraph_3')
                <p>"Sed id neque arcu. Pellentesque dictum vitae purus non consequat. In at dictum augue. Vestibulum sed enim sem. Aenean eu dui vulputate, laoreet diam quis, fermentum velit. Aenean at mauris ultrices, posuere enim quis, congue turpis. Quisque iaculis tempor turpis convallis ultricies. Donec quis egestas nulla. Nulla vitae egestas quam. Praesent id est augue. Duis sodales laoreet augue ac interdum. Phasellus scelerisque orci metus, hendrerit sagittis orci feugiat vel."
                <span class="blockquote-footer text-right">Quote source here</span></p>
                @endslot
            @endcomponent

            @component('pages/reads/books/show')
                @slot('book')asanas
                @endslot
                @slot('page')page
                @endslot
                @slot('paragraph_1')
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
                @endslot
                @slot('paragraph_2')
                <p>Aenean rhoncus a arcu id mollis. Proin vitae congue neque, vel porttitor est. Integer vitae turpis pharetra, luctus turpis ut, mollis diam. Fusce ultrices mi nunc, vitae dignissim orci imperdiet quis.</p>
                @endslot
                @slot('paragraph_3')
                <p>"Sed id neque arcu. Pellentesque dictum vitae purus non consequat. In at dictum augue. Vestibulum sed enim sem. Aenean eu dui vulputate, laoreet diam quis, fermentum velit. Aenean at mauris ultrices, posuere enim quis, congue turpis. Quisque iaculis tempor turpis convallis ultricies. Donec quis egestas nulla. Nulla vitae egestas quam. Praesent id est augue. Duis sodales laoreet augue ac interdum. Phasellus scelerisque orci metus, hendrerit sagittis orci feugiat vel."
                <span class="blockquote-footer text-right">Quote source here</span></p>
                @endslot
            @endcomponent
    	</div>
    </div>
</section>

<div class="modal fade" id="preview-slides" tabindex="-1" role="dialog" aria-labelledby="preview-slidesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;background: transparent;border-radius: 0;">
    	<img src="" id="book-preview" class="figure-img img-fluid">
    </div>
  </div>
</div>
