@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/articles/show/lead', [
        'category' => 'Introduction to Yoga', 
        'category_url' => route('reads.learning.index')
    ])

    @component('pages/reads/learning/articles/show/content', ['title' => 'The Benefits of Yoga Practice'])
    	@slot('content')
            <p class="lead pb-4 px-4 pt-0 text-center">Yoga is a journey to mental, physical and spiritual well-being. It takes you to experience a meditation in motion, a mindful exercise that strengthens our connection with nature. As we become more connected to the energies of nature, we unfold the unique creative power within each one of us, promoting optimal health, physical and emotional balance, vitality and mental clarity. A regular practice brings spiritual, mental and physical benefits:</p>

            @include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Physical fitness'])

            <p>Yoga is an excellent form of physical activity, moving a lot of energy with challenging exercises for the body and mind. Practicing yoga regularly boosts muscle power and endurance, improves posture, increases blood circulation, supports a healthy metabolism, helps to burn excessive fat, gives strength, flexibility and graceful movements, improves functions of internal organs, and promotes overall health.</p>

    		@include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Mental health'])

    		<p>A regular practice gradually gives you peace of mind, encourages self care, increases your self-esteem and inner strength, helps with insomnia, relieves stress, depression, anxiety, and other common mood disorders. It strengthens the immune system, builds emotional balance, reduces muscle tension and inflammation, increases body awareness, enhances brain function and sharpens concentration.</p>
                
            @include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Spiritual growth'])
            
            <p>Yoga can be described as a group of physical, mental, and spiritual practices originated in ancient India and aimed to balance and harmonize our body, mind and spirit to raise us to higher levels of consciousness; that is, to awaken our inner spiritual consciousness and unlock the divine potential within, a cource of bliss, inspiration, and creativity.</p>
            <p>Yoga postures are a bridge between this world and the divine. It is a meditation in motion, a mindful exercise that strengthens our connection with nature. As we become more connected to the energies of nature, we unfold the unique creative power within each one of us, promoting optimal health, physical and emotional balance, vitality and mental clarity.</p>

    	@endslot

    @endcomponent
</div>
@endsection

@section('scripts')
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://anandamayiyoga.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
@endsection