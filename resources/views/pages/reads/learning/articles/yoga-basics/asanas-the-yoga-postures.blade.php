@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/articles/show/lead', [
        'category' => 'Introduction to Yoga', 
        'category_url' => route('reads.learning.index')
    ])
    
    @component('pages/reads/learning/articles/show/content', ['title' => 'Asanas: the Yoga Postures'])
        @slot('content')

            <div class="my-5">
              <p class="lead mb-0">“Asanas bring perfection in body, beauty in form, grace, strength, compactness, and the hardness and brilliance of a diamond”</p>
              <p class="text-muted text-right m-0">&mdash; Patanjali</p>
            </div>

            @include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Contents'])
            <ol>
                <li><a class="link-blue" href="#{{str_slug('Asana: the third limb of Raja Yoga')}}">Asana: the third limb of Raja Yoga</a></li>
                <li><a class="link-blue" href="#{{str_slug('What is an Asana?')}}">What is an Asana?</a></li>
                <li><a class="link-blue" href="#{{str_slug('Benefits of Yoga Asanas')}}">Benefits of Yoga Asanas</a>
                    <ol>
                        <li><a class="link-blue" href="#{{str_slug('Health and fitness')}}">Health and fitness</a></li>
                        <li><a class="link-blue" href="#{{str_slug('Mental and physical health')}}">Mental and physical health</a></li>
                        <li><a class="link-blue" href="#{{str_slug('A gateway to connect with the divine')}}">A gateway to connect with the divine</a></li>
                    </ol>
                </li>
                <li><a class="link-blue" href="#{{str_slug('How to master a Yoga posture?')}}">How to master a Yoga posture?</a></li>
                <li><a class="link-blue" href="#{{str_slug('The importance of breath')}}">The importance of breath</a></li>
                <li><a class="link-blue" href="#{{str_slug('Different types of Asanas')}}">Different types of Asanas</a></li>
                <li><a class="link-blue" href="#{{str_slug('Adaptative Yoga')}}">Adaptative Yoga</a></li>
            </ol>

    		@include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Asana: the third limb of Raja Yoga'])
    		
    		<p>The word Yoga is derived from the Sanskrit expression yuj, which means "to join" or "to unite". Therefore, Yoga means "union" or "oneness", which refers to a union between the individual consciousness and the divine.</p>

            <p>The sage Patañjali, who codified the “Yoga Sutras”<sup>1</sup>, describes in this classic book the eight limbs of Raja Yoga, which are guidelines of practices that one must go through before achieving the goal of Yoga: union with the Divine. Along the way, they can help you achieve purity of mind and body, increased mental powers and radiant health. In brief the eight limbs are:</p>

            <ol>
                <li>Yamas (ethical self-restraints),</li>
                <li>Niyamas (ethical observances),</li>
                <li>Asana (yogic physical postures),</li>
                <li>Pranayama (control of the breath),</li>
                <li>Pratyhara (withdrawing one's mind from the senses),</li>
                <li>Dharana (deep concentration),</li>
                <li>Dhyana (deep meditation),</li>
                <li>Samadhi (super-Consciousness)</li>
            </ol>

            <p>These practices provide a foundation of moral and ethical behavior, self discipline and meditation to purify the body and mind to develop virtuous qualities and reach oneness with the divine. As we can see, Asana is the third limb of Patanjali's Eight Limbs of Yoga.</p>

    		@include('pages/reads/learning/articles/show/subtitle', ['slot' => 'What is an Asana?'])

    		<p>The word Asana comes from Sanskrit (आसन ) and means “'sitting down”. In the Yoga Sutras, Patanjali defines Asana as to be seated in a position that is steady and relaxed<sup>2</sup>, referring specifically to the seated postures used for meditation practices.</p>

            <p>Asanas are physical postures of Yoga practice and belong to Hatha Yoga, which is the most popular branch of Yoga. The practices in Hatha Yoga consist of Asanas (physical postures),   pranayamas (breathing exercises), mudras, bandhas (the "body locks") and shatkarmas (cleansing practices). These practices focus on the purification of the body and mind aiming for the spiritual development of the yogi.  It is a path of inner power and self-transformation.</p>

            <p>The Gheranda Samhita<sup>3</sup> states that: “There are eighty-four hundreds of thousands of Asanas described by Shiva. The postures are as many in number as there are numbers of species of living creatures in this universe. Among them eighty-four are the best; and among these eighty-four, thirty-two have been found useful for mankind in this world”. (Gheranda Samhita 2.1-2)</p>

    		@include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Benefits of Yoga Asanas'])

    		<p>The benefits of this ancient practice are not just for seasoned yogis. In as little as two hours per week, you can improve your physical and mental health through Yoga.</p>
    		
    		<ul class="list-style-none">
                <li>
                    @include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Health and fitness'])
                    <p>Yoga provides an excellent form of physical activity, moving a lot of energy with challenging exercises for the body and mind. Regular practice promotes overall health. It boosts muscle power and endurance, improves posture, increases blood circulation, supports a healthy metabolism, helps to burn excessive fat, improves the functioning of internal organs, gives strength, flexibility and graceful movements. It is important to emphasize that Yoga should not be taught as if it were a simple physical exercise but rather associated with its original philosophy.</p>

                    <p>Through various twists, bends, and stretches, Yoga postures help to increase blood circulation and improve the functioning of internal organs, to cleanse toxins through the lymphatic system and to support the natural detoxification process. By detoxifying your body, your overall health will improve, boosting immune function, enhancing the function of all body organs and helping to reduce inflammation in the body. It will also give you more energy, increased mental clarity, and that healthy “glow,” with clearer skin, healthier hair, and stronger nails.</p>
                </li>
                <li>
                    @include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Mental and physical health'])
                    <p>Mental health includes our emotional, psychological, and social well-being. Regular practice of Asanas results in excellent mental benefits. It helps to calm the mind, relieves stress, depression, anxiety, and other common mood disorders. It also reduces tension in your mind and body, increasing bodily awareness, brain function and concentration.</p>

                    <p>Apart from its spiritual philosophy, Yoga has been used as therapeutic support to prevent and treat diseases at various levels. Yoga therapy is a growing type of treatment that encourages the integration of the body and mind, using Yoga postures (Asanas), breathing exercises (pranayamas) and meditation to improve mental and physical health.</p>

                    <p>Yoga therapy is emerging as an effective treatment for several health conditions such as stress, chronic pain, Post-Traumatic Stress Disorder (PTSD), insomnia, infertility, diabetes, allergies, asthma, osteoporosis, fatigue, depression, anxiety, low self-esteem, drug addiction, and migraines.</p>
                </li>
                <li>
                    @include('pages/reads/learning/articles/show/subtitle', ['slot' => 'A gateway to connect with the divine'])
                    <p>Yoga postures are a gateway through which you can connect with the divine, whatever your religion. It is meditation in motion, a mindful exercise that strengthens our connection with the energies of nature, promoting optimal health, physical and emotional balance, vitality and mental clarity.</p>

                    <p>Each Asana represents an inner attitude aligned with the divine, so by learning to perform the postures, you will gradually bring your consciousness to a higher level, developing inner strength, concentration, and mental clarity.</p>
                </li>
            </ul>

    		@include('pages/reads/learning/articles/show/subtitle', ['slot' => 'How to master a Yoga posture?'])

            <p>In Yoga philosophy, Hatha Yoga was designed to align the body, mind, and spirit in preparation for meditation. Through Yoga postures, you place your body in positions aimed to cultivate concentration, balance, and relaxation to practice meditation.</p>

            <p>Your body should be firm and relaxed. As Patanjali explained: “Posture is mastered by releasing tension and meditation on the Unlimited.” (Sutra 2.74)</p>

            <p>Steady and comfortable posture comes through two means:</p>

            <ol>
                <li>Letting go all tensions or efforts to stay in the pose</li>
                <li>Focus your mind meditate on the infinite</li>
            </ol>

            <p>What is essential for the practice is a real spirit of devotion. Devotion leads you to a state of meditation while performing Yoga postures. Devotion can take us beyond technique, opening our hearts and our intuitive perception to understand Yoga on a deeper level.</p>

            <p>As Patanjali taught: “Perfection in Asana is achieved when the effort to perform it becomes effortless and the infinite being within is reached.” (Sutra 2.42)</p>

            <p>As you learn to let your body go and surrender into the postures, you will experience each Asana as a prayer in motion, an opportunity to turn the mind's focus inwards and discover the innate wisdom of your body. </p>

            <p>Patanjali explains that when asanas are mastered, the yogi is not touched by the pairs of opposites. (Sutra 2.48). What does it mean?</p>

            <p>We usually view ourselves as being apart from the world. We look at the world and the situations unfolding as being separate from us. This traditional idea of duality makes us believe that we are separate from the world, which becomes an object of our affections, anguish, dislike, judgments, etc.</p>

            <p>When the Yoga posture is mastered, the yogi can overcome the barrier of duality to reach a higher level of consciousness.  Then, it’s possible to experience a deep sense of rest and peace, like a deep sleep that makes you wake up fresh, feeling that your bodily and mental energy has been restored and revitalized.</p>

            <p>Through that experience of deep meditation, it becomes possible to reach a state of “silence” or “emptiness,” allowing the harmony of the celestial spheres to come to you. Once you reach this state, you may feel like your body is being taken by the flow of the movements rather than you being the one making the moves. Once your mind reaches a state of “emptiness,” your ego is no longer in command, and you are free to enjoy being in harmony with the whole.</p>

            @include('pages/reads/learning/articles/show/subtitle', ['slot' => 'The importance of breath'])

            <p>Breathing correctly during your practice will make you feel revitalized, while improper breathing can make you feel tired quickly.  During your training, you should always breathe through your nose, making sure your breath is slow, natural and gentle rather than forced and strained.  A slow, rhythmic breath, synchronized with the movements will help to calm your mind and focus your practice. As your breathing becomes steady and smooth, so will your body’s movements and your mind.</p>

            <p>Breathing deeply will allow the air into all parts of your lungs, keeping your oxygen intake high, which means supplying your whole body with oxygen, making you feel less tired. Deep breathing also encourages the detoxification process, which means you will be removing substances that are harmful to your body.  Proper breathing makes you use the right set of muscles, which will also improve your posture, strengthening your abdominal muscles and relieving tension in your neck and back.</p>

            <p>Once you get used to breathing correctly, your body will soon pick up the rhythm, and you will be able to do it in your everyday life. Without noticing, you will be automatically breathing correctly.</p>

            @include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Different types of Asanas'])

            <p>Through various twists, bends, and stretches, Yoga postures help to untie both physical and psychological knots. Very soon, regular practice increases your flexibility, releasing tensions from your body and mind, which brings a sense of general well-being.</p>

            <p>There are four main kinds of Asanas:</p>

            <ol>
                <li>
                    <p><u>Twisting poses (Asanas that involves spinal rotation)</u></p>
                    <p>By twisting, you are stretching the deepest layer of your back muscles, keeping your spine supple and healthy. Twisting Asanas also squeeze and stimulate the abdominal and digestive organs, thereby rinsing toxins from the body. Twisting postures push out old blood from internal organs and as the twist is released oxygenated new blood can flow in. It means that, as you twist freshly oxygenated blood is being taken to your organs.<sup>4</sup></p>
                    <p>Ex.: Half Lord of the Fishes Pose (Ardha MatsyendrAsana), Revolved Triangle Pose (Parivrtta TrikonAsana), Marichi's Pose (MarichyAsana III).</p>
                </li>
                <li>
                    <p><u>Forward bends, side bends, and backbends</u></p>
                    <ul class="mb-4">
                        <li>Forward bends help to compress the digestive organs, supporting healthy elimination. Forward bends also build strength and flexibility in the spine, releasing tension in the neck and back.  Ex.: Seated Forward Bend (Paschimottanasana), Standing Forward Bend (Uttanasana).</li>
                        <li>Side bends help to increase spinal flexibility, improve posture and breathing capacity.  .Ex.: Upward Salute (Urdhva Hastasana), Triangle (Utthita Trikonasana).</li>
                        <li>Backbends help to realign our spine and alleviate back pain. They open our shoulders and chest, strengthening the back muscles and improving posture. Ex.: Bow Pose (Dhanurasana), Cobra Pose (Bhujangasana).</li>
                    </ul>
                </li>
                <li>
                    <p><u>Inverted poses (any Asana in which the head is below the heart)</u></p>
                    <p>Inverted Asanas are playful and challenging. Practicing inversions reverses blood flow in the body, stimulating the lymphatic system and thereby helping to remove toxins from the body. Inversion also increases the blood flow to the brain, giving it more oxygen, hence increasing its function.</p>
                    <p>Going against gravity stimulates the nervous system, making you experience lower blood pressure and a pleasant a sense of well-being. Inversions also help to strengthen the arms, legs, back and core abdominal muscles.</p>
                    <p>Ex.: Headstand (Sirsasana), Supported Shoulderstand (Salamba Sarvangasana), Forearm Stand (Pincha Mayurasana)</p>
                </li>
                <li>
                    <p><u>Restorative (well-supported Asanas that offer the body the opportunity to relax)</u></p>
                    <p>Restorative Asanas are well-supported poses offer the body the chance to concentrate on the stress stored in your body and release. These postures are an excellent choice to increase your flexibility safely and enhance your immune system through deep relaxation. Restorative poses help to treat and heal emotional pain, bringing physical and mental balance.</p>
                    <p>Ex.: Child´s pose (balasana, Corpse Pose (Savasana) and Happy Baby Pose (Ananda Balasana).</p>
                </li>
            </ol>

            @include('pages/reads/learning/articles/show/subtitle', ['slot' => 'Adaptative Yoga'])

            <p>Most Yoga postures can be modified to accommodate physical limitations or injuries. That is why even individuals with disabilities or chronic health conditions can benefit from Yoga practice.</p>
            <p>Chair yoga is a gentle form of yoga that is practiced sitting on a chair, or standing using a chair for support. In a Chair Yoga class, Asanas are modified and adapted to meet the needs of people who want to perform the poses more comfortably and safely. This gentle style of yoga is a great option not only for seniors, but also for young people who are recovering from illness, or have physical limitations that prevent them from being able to engage in a regular Yoga practice.</p>
            <p>As you start your adaptive Yoga practice, you should always listen to your body, moving gently and within your body’s limits. Listen carefully to your teacher’s instructions and perform the postures as correctly as possible, always respecting your physical limitations. Verify that your body is aligned and you are feeling the stretches in the right places. Make sure you are not exceeding your limits.</p>

            @include('pages/reads/learning/articles/show/footnotes', [
            'notes' => [
                'The Yoga Sūtras of Patañjali are 196 Indian sutras (aphorisms) compiled prior to 400 CE by Sage Patañjali, who took materials about Yoga from older traditions.',
                'Verse 46, chapter II; for translation referred: "Patanjali Yoga Sutras" by Swami Prabhavananda , published by the Sri Ramakrishna Math',
                'The Gheranda Samhita is one of three main texts on classic Hatha yoga; the other two being Hatha Yoga Pradipika and the Shiva Samhita. It was written in the late 17th century and is organized into seven chapters and contains 351 shlokas (verses).',
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
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection