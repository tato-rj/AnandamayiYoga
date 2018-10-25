@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/articles/show/lead', [
        'category' => 'Yoga Therapy', 
        'category_url' => route('reads.learning.index')
    ])

    @component('pages/reads/learning/articles/show/content', ['title' => 'Depression and Anxiety'])
    	@slot('content')
            <p>Several studies indicate Yoga can benefit those with depression, anxiety, and other mental disorders. A study published in the International Journal “Evidence-Based Complementary and Alternative Medicine” concluded that participants with major depression found that 20 sessions of Yoga led to an elevation of mood and reduction of anger and anxiety.</p>

            <p>In their survey, all participants felt better from before to after each Yoga class: more positive, less negative, and more energetic.Thus, mood improvements associated with Yoga practice appear to be universal. But of course, how they affect depression in any one person must depend on other individual characteristics.<sup>1</sup></p>

            <p>There is also evidence that Yoga practices help increase the body's ability to respond to stress more flexibly. Yoga can reduce the impact of exaggerated stress responses.  By reducing perceived stress and anxiety, Yoga appears to modulate stress response systems.<sup>2</sup></p>

            @include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Why is that?'])
            
            <p>Practicing Yoga causes an increase in the calming neurotransmitter GABA (gamma-aminobutyric acid),  helping to ease the symptoms of depression and anxiety. Researchers have found that three sessions of the exercise a week can help fight off depression as it boosts levels of the calming amino acid GABA. This chemical is essential to the function of the brain and central nervous system, and it helps promote a state of tranquility. Low GABA levels are associated with depression and other widespread anxiety disorders. Scientists found that the levels of the amino acid GABA are much higher in those that carry out Yoga than those that do similar strenuous exercise such as walking.<sup>3</sup></p>

            @include('pages/reads/learning/articles/show/footnotes', [
            'notes' => [
                'Shapiro, David et al. “Yoga as a Complementary Treatment of Depression: Effects of Traits and Moods on Treatment Outcome.” Evidence-based Complementary and Alternative Medicine : eCAM 4.4 (2007): 493–502. PMC. Web. 15 Apr. 2018.',
                'Harvard Mental Health Letter. Yoga for anxiety and depression. Harvard Medical School. Published on April, 2009; Updated: September 18, 2017. Available in.: https://www.health.harvard.edu/mind-and-mood/Yoga-for-anxiety-and-depression',
                'Alleyne. Richard. Yoga protects the brain from depression.  The Telegraph. Published on 20 Aug 2010. Available in.: https://www.telegraph.co.uk/news/health/news/7956508/Yoga-protects-the-brain-from-depression.html']
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