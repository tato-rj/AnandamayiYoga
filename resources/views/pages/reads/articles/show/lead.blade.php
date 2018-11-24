<div class="row">
	<section class="col-12 bg-full d-flex align-items-end" style="background-image:url({{cloud($article->image_path)}}); background-position: center; height: 60vh;">
		<div class="overlay w-100 h-100 bg-dark z-0"></div>
		<div class="container-fluid">
			<div class="row text-white z-10 w-100">
				<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto mt-5">
					@include('components/buttons/return', [
					'path' => route('reads.articles.index', $article->topic->slug),
					'label' => __('back to articles about') . ' ' . $article->topic->name,
					'style' => 'link-none'])
				</div>
			</div>
		</div>
	</section>
</div>