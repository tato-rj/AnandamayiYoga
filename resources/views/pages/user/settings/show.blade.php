<section id="scroll-mark" class="container py-4">
    
    @include('components/buttons/return', [
        'path' => route('user.home'),
        'label' => __('return to my dashboard')])

    <div class="row my-3">

        @include('pages/user/settings/menu')

    	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 mx-auto">
    		<h3 class="mb-4"><strong>{{$title}}</strong></h3>

            {{$slot}}

    	</div>
    </div>
</section>