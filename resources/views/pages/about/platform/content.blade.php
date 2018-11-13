<section id="scroll-mark" class="container py-4">

    @title(['title' => 'About Anandamayi Yoga'])

    <div class="row">

        <div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto">
            <p class="lead">@lang('AnandamayiYoga is an online platform for everyone to have a Yoga practice at home. Our platform is a journey to the spiritual dimension of Yoga with a diversity of classes, an asana library and articles covering a vast and varied range of subjects.')</p>
        </div>

        <div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto mt-4">
        	<article>
	        	<h4 class="text-red mb-4">@lang('What we do')</h4>
	        	<p>@lang('We provide an online resource of Yoga for teachers, long-term practitioners and people who are new to Yoga. Users can explore our platform using filters for style, level, and duration. Our members can customize their homepage creating their playlists and tracking their progress.')</p>
	        	<p>@lang('We also offer a customized service, where we create a Yoga practice for your personal needs. We are continually expanding our platform with new content to attend your needs. We welcome any suggestions or comments to improve your experience with us.')</p>
        	</article>
        	<article class="mt-5">
	        	<h4 class="text-red mb-4">@lang('Our vision')</h4>

	        	<p>@lang('We believe that having a true spirit of devotion is what will make Yoga transform your life. Devotion can take us beyond technique, opening our hearts and our intuitive perception to understand Yoga on a deeper level.')</p>
	        	<p>@lang('Whether in stillness or motion, meditation is a practice that aims to purify and transform the mind, invoking a shift in our consciousness to a higher level. All our classes are focused on helping you to reach a meditative state in your practice and build healthy habits that will make you recognize and develop your potentialities.')</p>
        	</article>
        	<article class="my-5">
	        	<h4 class="text-red mb-4">@lang('Our classes')</h4>
	        	<p>@lang('There are many styles of Yoga, and they all descend from the classical Hatha Yoga. Some focus on the meditation aspect of Yoga, some on the relaxation of the body and mind, and some on the physical aspect. Here is a list of the classes we offer so you can choose the ones that better suits you.')</p>

        		<div class="accordion mt-4" id="categories-list">
        			@foreach($categories as $category)
        			<div class="card border-0">
        				<div 
        					class="card-header border-0 py-3 bg-light mb-2 cursor-pointer d-flex align-items-center justify-content-between" 
        					id="heading-{{$loop->iteration}}"
        					 data-toggle="collapse" data-target="#collapse-{{$loop->iteration}}">
        					<p class="mb-0 text-muted"><strong>{{$category->name}}</strong></p>
        					<span><i class="fas fa-caret-down text-muted"></i></span>
        				</div>

        				<div id="collapse-{{$loop->iteration}}" class="collapse mb-2" aria-labelledby="heading-{{$loop->iteration}}" data-parent="#categories-list">
        					<div class="card-body">
        						<p class="text-muted lead">{{$category->subtitle}}</p>
        						<p class="mb-2">{{$category->description}}</p>
        						<p class="text-right"><a class="link-blue" href="{{route('discover.category', $category->slug)}}">@lang('Click here to learn more')</a></p>
        					</div>
        				</div>
        			</div>
        			@endforeach
        		</div>

        	</article>
        </div>
    </div>
</section>