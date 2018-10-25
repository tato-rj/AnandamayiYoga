@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/articles/show/lead', [
        'category' => 'Introduction to Yoga', 
        'category_url' => route('reads.learning.index')
    ])
    
    @component('pages/reads/learning/articles/show/content', ['title' => 'What is Yoga?'])
    @slot('content')

    		@include('pages/reads/learning/articles/show/subtitle', ['slot' => 'The meaning of the word “Yoga”'])
    		
    		<p>The word <i>Yoga</i> is derived from the Sanskrit expression <i>yuj</i>, which means "to join", or "to unite". Therefore, "Yoga" means "union" or "oneness", which refers to a union with the cosmic consciousness. In other words, a union between the individual consciousness and the divine.</p>

    		@include('pages/reads/learning/articles/show/subtitle', ['slot' => 'The art of Yoga'])

    		<p>The art and science of Yoga can be described as a group of physical, mental, and spiritual practices originated in ancient India and aimed to harmonize our body, mind and spirit to raise our consciousness to higher levels; that is, awaken our inner spiritual consciousness and unlock the divine potential within, a source of bliss, inspiration, and creativity.</p>

    		@include('pages/reads/learning/articles/show/figure', [
                'name' => 'meditation',
                'caption' => 'Caption for the above image goes here'
            ])

    		@include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Macrocosm and Microcosm'])

    		<p>Indian philosophy sees a human being as a microcosm. It means that each one of us is a little world and its structure corresponds to the macrocosms, that is, the Universe. We are a microcosmic copy of the Universe, and the energies found in the universe also exists within us. Therefore, to reunite with the divine is to reconnect with our inner essence. Yoga is a bridge between this world and the divine, showing us a path to discover our inner light.</p>
    		
    		@include('pages/reads/learning/articles/show/subtitle', ['slot' => 'The Yoga Sutras of Patañjali'])

    		<p>The sage Patañjali , who codified the “Yoga Sutras”, <sup>1</sup> describes in this classical book the eight limbs of Yoga, which are guidelines of practices that one must go through before achieving the goal of Yoga: union with the Divine. Along the way, the practices of self discipline and meditation help us to purify the body and mind to develop virtuous habits, radiant health, increased mental strength and a profound sense of peace, joy and fulfillment.</p>



    		@include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Hatha Yoga'])

    		<p>It is very common to confuse Yoga with Hatha Yoga, which is a branch of Yoga. Hatha Yoga focus on the purification of the body and mind aiming for spiritual development of the yogi. It is a system that combines asanas (physical postures), pranayamas (breathing exercises), and meditation, leading to physical health, mental balance, and spiritual elevation. 
            @component('pages/reads/learning/articles/show/quote')Yoga is a bridge between this world and the divine, showing us a path to discover our inner light.
            @endcomponent
            Yoga postures are like a bridge through which one can connect with the divine, whatever your religion is. It is a meditation in motion, a mindful exercise that strengthens our connection with nature. As we become more connected to the energies of nature, we unfold the unique creative power within each one of us, promoting optimal health, physical and emotional balance, vitality and mental clarity.</p>

    		@include('pages/reads/learning/articles/show/subtitle', ['slot' => 'The importance of devotion'])

    		<p>What is essential for the practice of Yoga is a true spirit of devotion. Devotion leads you to a state of meditation while performing Yoga postures. Devotion can take us beyond technique, opening our hearts and our intuitive perception to understand Yoga in a deeper level. One must learn to relax and surrender through each movement, seeking peace and comfort in each posture.</p>
    		
    		@component('pages/reads/learning/articles/show/footnote')
    			<p class="p-2"><small><sup>1</sup> The Yoga Sūtras of Patañjali are 196 Indian sutras (aphorisms) compiled prior to 400 CE by Sage Patañjali, who has taken materials about Yoga from older traditions.</small></p>
    		@endcomponent

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
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection