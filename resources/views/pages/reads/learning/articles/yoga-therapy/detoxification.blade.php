@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/articles/show/lead', [
        'category' => 'Yoga Therapy', 
        'category_url' => route('reads.learning.index')
    ])

    @component('pages/reads/learning/articles/show/content', ['title' => 'Detoxification'])
    	@slot('content')
            <p>Detoxification means cleansing the body from the inside out. It means removing toxins from our bodies – such as chemical additives, allergens, and other toxins in our food, water and the air we breathe. We are cleaning and detoxifying our body all the time. Our body's detox system work continually to eliminate these harmful substances through our kidneys, intestines, lungs, lymphatic system, and skin.</p>
            <p>When these the detoxification systems are working correctly, your body runs a natural detoxification process, which improves your quality of life and protects you from many kinds of diseases.  However, when these systems are not working as they should, the body will not eliminate toxic substances and metabolic wastes, which can cause various health problems.</p>
            <p>Research shows that the inability to detoxify can lead to many diseases, including cancer, Parkinson’s disease, fibromyalgia, and chronic fatigue/immune dysfunction syndrome. But many other conditions are also related to toxicity in the body: thyroid dysfunction, arthritis, heart disease, asthma, gastritis, pancreatitis, Alzheimer’s disease, sinus congestion, allergy-like responses, joint pain, headaches, skin rashes, indigestion, acne, nausea, backache, insomnia, fatigue and the list goes on.</p>
            <p>Through various twists, bends, and stretches, Yoga postures help to increase blood circulation and improve the functioning of internal organs, cleansing toxins through the lymphatic system and supporting the natural detoxification process. There are three kinds of asanas that help our body's detox system:</p>

            <ul>
                <li>First, twisting poses (asanas that involves spinal rotation) squeeze and stimulate the abdominal and digestive organs, thereby rinsing toxins from the body. Twisting postures push out old blood from internal organs<sup>1</sup> and as the twist is released oxygenated new blood can flow in. It means that, as you twist freshly oxygenated blood is being taken to your organs.</li>
                <li>Next, forward bends help to compress the digestive organs, supporting healthy elimination.</li>
                <li>Third, inverted poses (any asana in which the head is below the heart) reverses blood flow in the body, stimulating the lymphatic system and thereby helping to remove toxins from the tissues in our body.</li>
            </ul>
         
            <p>By detoxifying your body, your overall health will improve. It will boost the immune system, enhance the function of all body organs, reduce inflammation in the body, give you more energy, increase mental clarity, and give you that healthy “glow” with clearer skin, healthier hair, and stronger nails.</p>

            @include('pages/reads/learning/articles/show/footnotes', [
            'notes' => [
                'Woodyard, Catherine. “Exploring the Therapeutic Effects of Yoga and Its Ability to Increase Quality of Life.” International Journal of Yoga 4.2 (2011): 49–54. PMC. Web. 16 Apr. 2018.']
            ])
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