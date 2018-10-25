@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/articles/show/lead', [
        'category' => 'Yoga Therapy', 
        'category_url' => route('reads.learning.index')
    ])

    @component('pages/reads/learning/articles/show/content', ['title' => 'Insomnia'])
    	@slot('content')
            <p>Sleeping is essential for us to maintain health both physically and mentally. The human organism physically restores itself during sleep, preventing diseases and sickness by strengthening the immune system.</p>

            <p>Inadequate sleep can have severe detrimental effects on health. Insomnia is the most common sleep disorder. It occurs more often in women and the elderly. There are more than 70 different sleep disorders, which are generally classified into one of three categories:<sup>1</sup></p>

            <ul>
                <li>lack of sleep (e.g., insomnia)</li>
                <li>disturbed sleep (e.g., obstructive sleep apnea)</li>
                <li>excessive sleep (e.g., narcolepsy)</li>
            </ul>
         
            <p>Several studies show that Yoga can help to improve your sleep quality, also working as a treatment for sleep problems and disorders. Researchers in the USA have found that over 55% of people who did Yoga found that it helped them get better sleep.<sup>5</sup></p>

            @include('pages/reads/learning/articles/show/footnotes', [
            'notes' => [
                'Overview of Sleep Disorders. Remedy´s health communities. http://www.healthcommunities.com/sleep-disorders/overview-of-sleep-disorders.shtml',
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