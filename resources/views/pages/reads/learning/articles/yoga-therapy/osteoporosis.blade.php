@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/articles/show/lead', [
        'category' => 'Yoga Therapy', 
        'category_url' => route('reads.learning.index')
    ])

    @component('pages/reads/learning/articles/show/content', ['title' => 'Osteoporosis'])
    	@slot('content')
            <p>Osteoporosis is a condition that that weakens bones, reducing their density and quality. The loss of bone occurs silently and progressively, making the bones more fragile and more likely to break. It is the most common reason for fractures among the elderly. Indeed, bone loss is a normal concomitant of aging in both genders. It occurs when the cellular events of bone formation are quantitatively larger than bone formation.</p>

            <p>Osteoporosis affects up to 200.000.000 people worldwide today, with numbers likely to grow with our aging population. Studies have shown that bone quality is qualitatively improved in Yoga practitioners. Practicing Yoga can improve your bone health, slowing and even reversing the process of bone loss, preventing the risk of osteoporosis. Yoga is also an effective treatment of osteoporosis, even for those who already have weakened bones. It causes bones to become thicker and stronger, preventing you from falling - which is the primary cause of all other osteoporotic fractures.<sup>1</sup></p>

            <p>If you have osteoporosis, you should ask your physician to check if it is safe to practice Yoga in your specific bone condition. If your physician allows, then you should consider a private class with a qualified instructor who can teach you appropriate exercises on your osteoporosis treatment plan. Since your instructor will focus on your needs, he or she will make sure your body alignment and movements are correct so you can gradually build up mobility and strength on your own time.</p>

            <p>Yoga is recommended to prevent and treat osteoporosis because it stimulates the bones to retain calcium and hence improving bone health. How can Yoga help your bones to retain calcium?</p>

            <p>Studies have shown that Yoga practice reduces stress<sup>2</sup>, lowering levels of cortisol, which is a hormone your body releases when you're under stress. High levels of cortisol is a result of a stress-filled life. It takes your body into a state of inflammation it becomes less able to absorb calcium, which is a mineral in our body indispensable to the building of bone.<sup>3</sup> A regular Yoga practice enhances muscular strength, flexibility, posture, balance, and coordination. Gradually, it causes bones to become thicker and stronger.</p>

            @include('pages/reads/learning/articles/show/footnotes', [
            'notes' => [
                'Lu, Yi-Hsueh et al. “Twelve-Minute Daily Yoga Regimen Reverses Osteoporotic Bone Loss.” Topics in Geriatric Rehabilitation 32.2 (2016): 81–87. PMC. Web. 12 Apr. 2018.',
                'Thirthalli, J. et al. “Cortisol and Antidepressant Effects of Yoga.” Indian Journal of Psychiatry 55.Suppl 3 (2013): S405–S408. PMC. Web. 12 Apr. 2018.',
                'Sparrowe L. Good to the bone. Yoga J. 2001. [Last cited on 2015 Nov 3]. p. 112. Available from:http://books.google.co.in/books?id=JeoDAAAAMBAJ&pg=PA112&dq=Good+to+the+bone.+Yoga+Journal+2001&hl=en&sa=X&redir_esc=y#v=onepage&q=Good%20to%20the%20bone.%20Yoga%20Journal%202001&f=false']
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