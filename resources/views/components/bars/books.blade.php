<section class="row d-none d-sm-block mb-7">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12 text-right books-display">
                <img class="reveal back" reveal-origin="right" reveal-delay="100" reveal-duration="750" src="{{cloud('app/images/books/saudacao_do_sol/front.jpg')}}">
                <img class="reveal front" reveal-origin="left" reveal-delay="200" reveal-duration="750" src="{{cloud('app/images/books/saudacao_da_lua/front.jpg')}}">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <p class="mb-1 text-uppercase" style="opacity: .4"><small><strong>@lang('Publications')</strong></small></p>
                <h3 class="text-uppercase">@lang('Learning about Yoga')</h3>
                <p class="lead">@lang('Whether you are looking to deepen your knowloedge of Yoga or want to start learning about it, our books will guide you through your journey.')</p>

                @component('components/buttons/simple', [
                    'path' => route('reads.books'),
                    'weight' => 'bold',
                    'color' => 'red',
                    'extra' => 'shadow-dark'])
                    @slot('label')
                    <i class="far fa-lightbulb mr-2"></i>@lang('Learn more about our publications')
                    @endslot
                @endcomponent

            </div>
        </div>
    </div>
</section>