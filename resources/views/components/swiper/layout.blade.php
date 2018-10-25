<section class="container-fluid mb-6 px-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-red"><strong>{{$title}}</strong></h3>
            </div>
        </div>
    </div>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            {{$slot}}
        </div>
        <div class="swiper-control swiper-right"><h1 class="m-0"><i class="fas fa-chevron-right"></i></h1></div>
        <div class="swiper-control swiper-left"><h1 class="m-0"><i class="fas fa-chevron-left"></i></h1></div>
    </div>    
</section>