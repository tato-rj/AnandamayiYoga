<section id="scroll-mark" class="container py-4">

    @include('components/buttons/return', [
            'path' => route('support.index'),
            'label' => 'return to help page'])

    <div class="row my-3">

        {{$menu}}

    	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 mx-auto">
    		<h3 class="mb-4"><strong>{{$title}}</strong></h3>

            {{$slot}}

            @include('components/feedback/hands')
    	</div>
    </div>
</section>