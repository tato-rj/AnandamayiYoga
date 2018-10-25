@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/articles/show/lead', [
        'category' => 'Yoga Therapy', 
        'category_url' => route('reads.learning.index')
    ])

    @component('pages/reads/learning/articles/show/content', ['title' => 'Chronic Pain'])
    	@slot('content')
            <p>Practicing Yoga regularly helps alleviate pain because it affects your response to pain. It increases the flow of oxygen to the brain and muscle tissues, creating a sense of well-being and decreasing the level of perceived suffering.</p>

            <p>An article published by the Harvard Medical School says that Yoga can help people with arthritis, fibromyalgia, migraine, low back pain, and many other types of chronic pain conditions. It references a study published in the Annals of Internal Medicine that surveyed 313 individuals suffering from lower back pain. Their research concluded that “a weekly Yoga class increased mobility more than standard medical care for the condition” and that “Yoga was comparable to standard exercise therapy in relieving chronic low back pain.”<sup>1</sup></p>

            @include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Why is that?'])
            
            <p>Chronic pain is known to cause brain anatomy changes. It alters the brain structure, leading to changes in gray matter volume and the integrity of white matter. The decreased gray matter has been observed in various chronic pain conditions.</p>

            <p>Gray matter is a major component of the central nervous system, containing most of the brain's neuronal cell bodies. The grey matter includes regions of the brain involved in muscle control, and sensory perception such as seeing and hearing, memory, emotions, speech, decision making, and self-control.<sup>2</sup> White matter is the tissue through which messages pass through your brain; it allows communication to take place between the different parts of your brain.<sup>3</sup></p>

            <p>Studies have shown that chronic pain is associated with brain gray matter reduction. In other words, people with chronic pain also have reduced gray matter.</p>

            <p>According to a National Institutes of Health (NIH), Yoga can be an important tool for preventing and even reversing the effects of chronic pain on the brain. Researchers have found that Yoga practitioners have more gray matter in multiple brain regions compared with individually matched people who did not practice Yoga. At the annual meeting of the American Pain Society, M. Catherine Bushnell<sup>4</sup>, noted: "Some gray matter increases in yogis correspond to the duration of Yoga practice, which suggests there is a causative link between Yoga and gray matter increases."</p>

            <p>A study published in the journal Cerebral Cortex shows that Yoga practitioners had greater gray matter volume in brain regions related to pain processing, pain regulation, and attention. They observed that to tolerate pain Yoga practitioners used cognitive strategies that are common in Yoga practice, such as use the breath and mind focus on the relaxation of the body, observing sensations without reacting and accepting the sensations.<sup>5</sup></p>

            <p>To measure pain tolerance, researchers have timed how long yogis and non-yogis could keep their keep their hands in freezing cold water. Surprisingly, yogis were able to tolerate pain twice as long as non-yogis. Through brain imaging, they found that “there were a number of parts of the brain that were larger in yogis, and there was one area, the insular cortex, that was specifically related to this increased pain tolerance,” says Dr. Bushnell. The insular cortex, or insula, is located deep in the brain and is the area responsible for coordinating body states with emotional responses, giving rise to conscious thought.<sup>6</sup></p>

            @include('pages/reads/learning/articles/show/footnotes', [
            'notes' => [
                'Yoga for pain relief. Harvard Health Publishing: Harvard Medical School. Published in April, 2015. Available in: www.health.harvard.edu/alternative-and-complementary-medicine/Yoga-for-pain-relief',
                'Miller, A. K. H.; Alston, R. L.; Corsellis, J. A. N. (1980). "Variation with Age in the Volumes of Grey and White Matter in the Cerebral Hemispheres of Man: Measurements with an Image Analyser". Neuropathology and Applied Neurobiology. 6 (2): 119–32.',
                'Sowell, Elizabeth R .; Peterson, Bradley S .; Thompson, Paul M .; Welcome, Suzanne E .; Henkenius, Amy L .; Toga, Arthur W. (2003). "Cortical mapping across the human life span". Nature Neuroscience. 6 (3): 309-15.',
                'M. Catherine Bushnell, PhD, is a scientific director of the National Center for Complementary and Integrative Health at the US National Institutes of Health (NIH).',
                'Villemure C, Čeko M, Cotton VA, Bushnell C. Insular cortex mediates increased pain tolerance in Yoga practitioners. Cerebral Cortex. May 21, 2013.',
                'Villemure, Chantal et al. “Insular Cortex Mediates Increased Pain Tolerance in Yoga Practitioners.” Cerebral Cortex (New York, NY) 24.10 (2014): 2732–2740. PMC. Web. 27 Apr. 2018.']
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