<section id="scroll-mark" class="container-fluid pb-2" style="margin-top: -120px;">
    <div class="row my-3">
    	<div class="col-lg-8 col-md-10 col-sm-12 col-12 p-0 mx-auto">
    		@include('components/lesson/video/player')
            @include('components/lesson/about')
    	</div>
    </div>
    @include('components/disqus/show')
</section>

@include('components/swiper/trending')
@include('components/swiper/latest')
