<section class="row d-none d-sm-block mb-7">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12 text-right books-display">
                <img class="reveal back" reveal-origin="right" reveal-delay="100" reveal-duration="750" src="{{cloud('app/images/books/saudacao_do_sol/front.jpg')}}">
                <img class="reveal front" reveal-origin="left" reveal-delay="200" reveal-duration="750" src="{{cloud('app/images/books/saudacao_da_lua/front.jpg')}}">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <p class="mb-1" style="opacity: .4"><small><strong>PUBLICATIONS</strong></small></p>
                <h3>LEARNING ABOUT YOGA</h3>
                <p class="lead">Pellentesque neque enim, tempus eget tincidunt non, suscipit in velit. Fusce diam est, sollicitudin vitae pretium quis, porttitor quis tortor.</p>

                @component('components/buttons/simple', [
                    'path' => route('reads.books'),
                    'weight' => 'bold',
                    'color' => 'red',
                    'extra' => 'shadow-dark'])
                    @slot('label')
                    <i class="far fa-lightbulb mr-2"></i>Learn more about our publications
                    @endslot
                @endcomponent

            </div>
        </div>
    </div>
</section>