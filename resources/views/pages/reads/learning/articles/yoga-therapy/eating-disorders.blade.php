@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/articles/show/lead', [
        'category' => 'Yoga Therapy', 
        'category_url' => route('reads.learning.index')
    ])

    @component('pages/reads/learning/articles/show/content', ['title' => 'Eating Disorders'])
    	@slot('content')
            <p>Practicing Yoga has been shown to increase mindfulness not just in class, but in other areas of a person's life. Mindfulness refers to focusing your attention on what's happening, to what you're doing. It also involves acceptance, meaning that you experience the present moment without judging yourself.</p>

            <p>Researchers describe mindful eating as a technique that helps you gain control over your eating habits. It has been shown to cause weight loss, reduce binge eating and help you feel better. They developed a questionnaire to measure mindful eating using these behaviors:</p>

            <ul>
                <li>Eating even when full (disinhibition)</li>
                <li>Being aware of how food looks, tastes and smells</li>
                <li>Eating in response to environmental cues, such as the sight or smell of food</li>
                <li>Eating when sad or stressed (emotional eating)</li>
                <li>Eating when distracted by other things</li>
            </ul>
         
            <p>The researchers found that people who practiced Yoga were more mindful eaters according to their scores. Both years of Yoga practice and number of minutes of practice per week were associated with better mindful eating scores. Practicing Yoga helps you be more aware how your body feels. This heightened awareness can carry over to mealtime as you savor each bite or sip, and note how food smells, tastes and feels in your mouth.<sup>1</sup> With regular practice of Yoga, you tend to become more sensitive to the kind of food you eat.</p>

            <p>Researchers found that people who practiced Yoga for at least 30 minutes once a week for at least four years, gained less weight during middle adulthood. People who were overweight lost weight. Overall, those who practiced Yoga had lower body mass indexes (BMIs) compared with those who did not practice Yoga. Researchers attributed this to mindfulness.<sup>2</sup></p>

            @include('pages/reads/learning/articles/show/footnotes', [
            'notes' => [
                'Harvard Medical School. Yoga – Benefits Beyond the Mat. Harvard Health Publishing: trusted advice for a healthier life. Published on February, 2015',
                'Harvard Medical School. Yoga – Benefits Beyond the Mat. Harvard Health Publishing: trusted advice for a healthier life. Published on February, 2015']
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