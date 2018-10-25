@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/articles/show/lead', [
        'category' => 'Yoga Therapy', 
        'category_url' => route('reads.learning.index')
    ])

    @component('pages/reads/learning/articles/show/content', ['title' => 'Stress'])
    	@slot('content')
            <p>When you are constantly under stress, your adrenal glands overproduce cortisol, the primary stress hormone. Overexposure to this hormone can affect the function of your brain, immune system, and other organs.  Chronic emotional stress can affect virtually every organ system in negative ways, according to National Institutes of Health (NIH). Prolonged stress has been shown to cause numerous health problems, including:<sup>1</sup></p>

            <ul>
                <li>Weakening of the immune system, making you more likely to have colds or other infections</li>
                <li>High blood pressure</li>
                <li>Upset stomach, ulcers and acid reflux</li>
                <li>Anxiety</li>
                <li>Increased rapid heartbeat and heart palpitations</li>
                <li>Panic attacks</li>
                <li>Cardio-vascular problems</li>
                <li>Increase in blood sugar levels</li>
                <li>Irritable bowel problems</li>
                <li>Backaches</li>
                <li>Tension headaches or migraines</li>
                <li>Sleep problems</li>
                <li>Chronic fatigue syndrome</li>
                <li>Respiratory problems and heavy breathing</li>
                <li>Worsening of skin conditions, such as eczema</li>
            </ul>

            <p>Though you may not be able to eradicate the roots of stress, learning to manage it successfully can minimize its effects on your body, improving your mental and physical health.<sup>2</sup> Mind-body practices like Yoga have been shown to reduce your body’s stress response by strengthening your relaxation response and lowering stress hormones like cortisol.<sup>3</sup> Yoga techniques can improve chemical balances in the brain and help reduce stress levels. A survey undertaken by the U.S Department of Health and Human Services has found that over 85% of people who did Yoga found that it helped them to reduce stress.<sup>4</sup></p>

            @include('pages/reads/learning/articles/show/footnotes', [
            'notes' => [
                'Sollitto, Marlo. Sick with Worry: How Thoughts Affect Your Health. Aging Care.com. Available in: https://www.agingcare.com/articles/health-problems-caused-by-stress-143376.htm',
                'Fabiny, Anne. What meditation can do for your mind, mood, and health. In.: Now and Zen: How mindfulness can change your brain and improve your health Harvard Health Publications. Longwood Seminars, March 8, 2016 - Content provided by Harvard Health Publications. Available in.: https://hms.harvard.edu/sites/default/files/assets/Harvard%20Now%20and%20Zen%20Reading%20Materials.pdf',
                'Wei, Marlynn. What meditation can do for your mind, mood, and health. In.: Now and Zen: How mindfulness can change your brain and improve your health Harvard Health Publications. Longwood Seminars, March 8, 2016 - Content provided by Harvard Health Publications. Available in.: https://hms.harvard.edu/sites/default/files/assets/Harvard%20Now%20and%20Zen%20Reading%20Materials.pdf',
                'Wellness-Related Use of Natural Product Supplements, Yoga, and Spinal Manipulation Among Adults. National Center for Complementary and Integrative Health (NIH). Available in: https://nccih.nih.gov/research/statistics/NHIS/2012/wellness?nav=chat']
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