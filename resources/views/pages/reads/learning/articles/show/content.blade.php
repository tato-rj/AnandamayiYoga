<section id="scroll-mark" class="container pb-5">
    <div class="row">
    	<div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto d-flex justify-content-between py-3 border-bottom">
			<p class="m-0">
				<strong class="mr-1 d-none d-xl-inline-block">Share this article on</strong>
				<a class="link-none" href="#"><i class="t-2 ml-3 fab fa-lg fa-facebook-f"></i></a>
				<a class="link-none" href="#"><i class="t-2 ml-3 fab fa-lg fa-twitter"></i></a>
				<a class="link-none" href="#"><i class="t-2 ml-3 fas fa-lg fa-envelope"></i></a>
			</p>
    		<p class="text-muted m-0"><small>BY {{$author or 'ALI ANANDAMAYI'}}</small></p>
    	</div>
    </div>
    <div class="row">
    	<div class="col-lg-8 col-md-10 col-sm-10 col-11 mx-auto my-3 pt-4 text-justify">
        @include('components/sections/title', [
            'title' => $title, 
            'margin' => '4'])

            {{$content}}
    	</div>
    </div>
    @include('components/disqus/show')
    <div class="row mt-5">
    	<div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
    		<h4 class="bg-blue text-white px-2 py-1 rounded mb-4"><strong>Related articles</strong></h4>
            
            @include('pages/reads/learning/articles/show/related', [
                'image' => 'yoga-philosophy',
                'title' => 'The meaning of the word “Yoga”',
                'date' => 'published on jul 12 2016',
                'preview' => 'Integer id ipsum hendrerit, venenatis nunc eget, accumsan urna. Ut sit amet nisi mattis, vulputate urna sed, convallis nisi. Quisque libero tortor, blandit eget dui vel, feugiat vulputate dui. Donec egestas sit amet diam vitae volutpat. Nulla nec mattis libero.'
            ])

            @include('pages/reads/learning/articles/show/related', [
                'image' => 'yoga-therapy',
                'title' => 'The Yoga Sutras of Patañjali',
                'date' => 'published on aug 22 2016',
                'preview' => 'Duis maximus ornare lobortis. Aliquam pulvinar, nisi vitae finibus mattis, massa lorem ultricies ligula, id accumsan mauris sem non sem. Proin hendrerit metus diam, ac bibendum turpis tempus a. Quisque eu consectetur ex. Quisque eget mattis velit, eu luctus dui.'
            ])

            @include('pages/reads/learning/articles/show/related', [
                'image' => 'yoga-basics',
                'title' => 'The importance of devotion',
                'date' => 'published on aug 29 2017',
                'preview' => 'Cras posuere ante sed sollicitudin semper. Morbi ut mi finibus, condimentum augue at, accumsan metus. Quisque nec est euismod, tempor nibh ut, auctor nunc. Nam nisl massa, ullamcorper a interdum quis, pulvinar non eros. Nulla at ex sed orci auctor aliquet id in nunc. Vivamus eu feugiat lorem, vitae aliquam urna.'
            ])


    	</div>
    </div>
</section>
