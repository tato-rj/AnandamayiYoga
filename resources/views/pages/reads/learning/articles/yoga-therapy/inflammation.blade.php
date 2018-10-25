@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/articles/show/lead', [
        'category' => 'Yoga Therapy', 
        'category_url' => route('reads.learning.index')
    ])

    @component('pages/reads/learning/articles/show/content', ['title' => 'Inflammation'])
    	@slot('content')
            <p>Inflammation is an essential part of the healing process in our body. It happens when the immune system fights against toxins, infections, and injuries. Inflammation is, therefore, an essential mechanism for the healing process.</p>

            <p>According to Dr. Deepak Bhatt, professor of medicine at Harvard Medical School, inflammation is the body's natural response to protect itself against harm. There are two types: acute and chronic. You're probably more familiar with the acute type, which occurs when you bang your knee or cut your finger. Your immune system dispatches an army of white blood cells to surround and protect the area, creating visible redness and swelling. The process works similarly if you have an infection like the flu or pneumonia. In these settings, inflammation is essential - without it, injuries could fester and simple infections could be deadly.<sup>1</sup> Examples of diseases, conditions, and situations that can result in acute inflammation include:<sup>2</sup></p>

            <ul>
                <li>acute bronchitis</li>
                <li>infected ingrown toenail</li>
                <li>a sore throat from a cold or flu</li>
                <li>a scratch or cut on the skin</li>
                <li>high-intensity exercise</li>
                <li>acute appendicitis</li>
                <li>dermatitis</li>
                <li>tonsillitis</li>
                <li>infective meningitis</li>
                <li>sinusitis</li>
                <li>a physical trauma</li>
            </ul>
         
            <p>In general, the innate inflammatory response initiates within minutes and, if all is well, resolves within hours. In contrast, chronic inflammation persists for weeks, months or even years.<sup>3</sup> With chronic inflammation, the body is in a constant state of alert and stress. This prolonged state of emergency can lead to several problems, including premature aging, damage to your heart, brain, and other organs. Chronic inflammation can lead to diseases and conditions, including cancer, heart disease, and rheumatoid arthritis.</p>

            <p>Several studies have shown that regular practice of Yoga can protect you against acute and chronic inflammation. This is because Yoga teaches a way for decreasing stress levels. It means that Yoga can teach us to respond less actively to stressors in our everyday lives. As Dr. Ron Glaser<sup>4</sup> said, "We know that inflammation plays a major role in many diseases. Yoga appears to be a simple and enjoyable way to add an intervention that might reduce risks of developing heart disease, diabetes, and other age-related diseases."<sup>5</sup></p>

            <p>Bill Malarkey, a professor of internal medicine and co-author on the study, pointed to the inflexibility that routinely comes with aging: "Muscles shorten and tighten over time, mainly because of inactivity," he said. "The stretching and exercise that comes with Yoga increases a person's flexibility and that, in turn, allows relaxation which can lower stress."<sup>6</sup></p>

            <p>Malarkey sees Yoga as one of the key solutions to our current health care crisis: "People need to be educated about this. They need to be taking responsibility for their health and how they live. Doing Yoga and similar activities can make a difference."<sup>7</sup></p>

            @include('pages/reads/learning/articles/show/footnotes', [
            'notes' => [
                'Bhatt, Deepak. What is inflammation?.Harvard Health Publishing: Harvard Medical School. Published in February, 2017. Available in: https://www.health.harvard.edu/heart-disease-overview/ask-the-doctor-what-is-inflammation',
                'Nordqvist, Christian. Everything you need to know about inflammation. Reviewed by Justin Choi, MD. Medical News Today (MNT). Last updated Fri 24 November 2017. Available in: https://www.medicalnewstoday.com/articles/248423.php',
                'Lawrence, Toby, and Derek W Gilroy. “Chronic Inflammation: A Failure of Resolution?” International Journal of Experimental Pathology 88.2 (2007): 85–94. PMC. Web. 9 Apr. 2018.',
                'Dr. Ron Glaser, PhD, is a professor in the Department of Molecular Virology, Immunology and Medical Genetics and director of the Institute for Behavioral Medicine Research.',
                'Adapted Media Release. Yoga Reduces Cytokine Levels Known To Promote Inflammation. Medical News Today (MNT). Published Tuesday 12 January 2010. Available in: https://www.medicalnewstoday.com/releases/175705.php',
                'Adapted Media Release. Yoga Reduces Cytokine Levels Known To Promote Inflammation. Medical News Today (MNT). Published Tuesday 12 January 2010. Available in: https://www.medicalnewstoday.com/releases/175705.php',
                'Adapted Media Release. Yoga Reduces Cytokine Levels Known To Promote Inflammation. Medical News Today (MNT). Published Tuesday 12 January 2010. Available in: https://www.medicalnewstoday.com/releases/175705.php']
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