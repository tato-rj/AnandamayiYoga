<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
    	Article::create([
    		'slug' => str_slug('The Purpose of Yoga'),
    		'title' => 'The Purpose of Yoga',
    		'title_pt' => 'O Propósito do Yoga',
    		'content' => '<div>The word <em>Yoga </em>is derived from the Sanskrit <em>expression yuj</em>, which <em>means</em>"to join" or "to unite”. Therefore, Yoga means "union" or "oneness," which refers to a union with the cosmic consciousness. In other words, a union between the individual consciousness and the divine.<br><br>Through a group of physical, mental, and spiritual practices, Yoga aims to purify and transform our minds, invoking a shift in our consciousness to higher levels of perception, gradually awakening our <em>inner spiritual</em> consciousness and unlocking the divine potential within.<br><br>Hindu<strong> </strong>philosophy sees a human being as a <em>microcosm</em>. This means that each of us is a miniature world and our structure corresponds to the macrocosm, that is, the Universe. In other words, we are a <em>microcosmic</em> copy of the Universe, and the energies found in the cosmos also exists within us.<br><br>According to Hinduism, each one of us has a divine essence called <em>Atman</em>. Yoga offers a direct means to quiet our conflicting impulses and turbulence of thoughts to connect to <em>this divine</em> spirit <em>within</em>, our higher <em>Self</em> or divine <em>Self.<br><br></em>Self-realization or enlightenment is the awakening of our inner spiritual consciousness to the divine essence of our Self, which is by nature self-luminous.&nbsp; But how Yoga can lead discover our inner spiritual force?<br><br>The sage Patañjali, who codified the “Yoga Sutras[1]”, describes in this classic book the eight limbs of Yoga, which are guidelines of practices that one must go through before achieving the goal of Yoga: union with the Divine.&nbsp; Along the way, the practices of self-discipline and meditation help us to purify the body and mind to develop virtuous habits, radiant health, <em>increased mental</em> strength and a profound sense of peace, joy, and fulfillment.<br><br>There are six different paths of Yoga that lead to this goal: Karma yoga (path of activity)Bhakti yoga (path of devotion) Jnana yoga (path of wisdom)Raja yoga (path of introspection)Hatha yoga (path of inner power and self-transformation)Mantra Yoga (path of sacred sound).<br><br>Like the branches of a tree, which are structurally attached to a single trunk, the Yoga paths are all connected to the same purpose, which is to guide the longest journey of any person: the journey inwards to discover our true divine nature.</div><div><br><sub>[1] The Yoga Sūtras of Patañjali are 196 Indian sutras (aphorisms) compiled prior to 400 CE by Sage Patañjali, who took materials about Yoga from older traditions.</sub></div>',
    		'content_pt' => null,
    		'author_id' => 1,
            'image_path' => 'app/demo/images/demo-1.jpg',
            'unique_token' => random_token()
        ]);

        \DB::table('article_article_topic')->insert(['article_id' => 1,'topic_id' => 1]);

        Article::create([
            'slug' => str_slug('Asanas: yogic physical postures'),
            'title' => 'Asanas: yogic physical postures',
            'title_pt' => 'Asanas: posturas do Yoga',
            'content' => '<div>The word <em>asana comes </em>from <em>Sanskrit (</em>आसन <em>) </em>and means “sitting down”. In the Yoga Sutras, Patanjali defines Asana as to be seated in a position that is steady and relaxed,[1] referring specifically to the seated postures used for meditation practices.<br><br>Asanas are physical postures of Yoga practice and belong to Hatha Yoga, which is the most popular branch of Yoga. The practices in Hatha Yoga consist of Asanas (physical postures), pranayamas (breathing exercises), mudras, bandhas (the "body locks") and shatkarmas (cleansing practices). These practices focus on the purification of the body and mind aiming for the spiritual development of the yogi.&nbsp; It is a path of inner power and self-transformation.<br><br>The <em>Gheranda Samhita</em>[2] states that: “There are eighty-four hundreds of thousands of <em>Asanas</em> described by Shiva. The postures are as many in number as there are numbers of species of living creatures in this universe. Among them eighty-four are the best; and among these eighty-four, thirty-two have been found useful for mankind in this world”. (Gheranda Samhita 2.1-2)<br><br>The sage Patañjali, who codified the “Yoga Sutras[3]”, describes in this classic book the eight limbs of Raja Yoga, which are guidelines of practices that one must go through before achieving the goal of Yoga: union with the Divine. Along the way, they can help you achieve purity of mind and body, increased mental powers and radiant health. In brief the eight limbs are:<br><br></div><ol><li>Yamas (ethical self-restraints),</li><li>Niyamas (ethical observances),</li><li>Asana (yogic physical postures),</li><li>Pranayama (control of the breath),</li><li>Pratyhara (withdrawing one\'s mind from the senses),</li><li><em>Dharana</em> (deep concentration),</li><li>Dhyana (deep meditation),</li><li>Samadhi (<em>super-Consciousness</em>)&nbsp;</li></ol><div>&nbsp;</div><div>These practices provide a foundation of moral and ethical behavior, self discipline and meditation to purify the body and mind to develop virtuous qualities and reach oneness with the divine.As we can see, Raja Yoga claims that Yamas and Niyamas must be practiced first. It means you first have to perfect Yamas[4] and Niyamas[5], otherwise <em>asanas</em> may fail to give desirable results as a spiritual practice.[6]<br><br><sub>NOTES</sub></div><div><sub>[1] Verse 46, chapter II; for translation referred: "Patanjali Yoga Sutras" by Swami Prabhavananda , published by the Sri Ramakrishna Math [2]&nbsp; The </sub><em><sub>Gheranda</sub></em><sub> </sub><em><sub>Samhita</sub></em><sub> is one of three main texts on classic Hatha yoga; the other two being Hatha Yoga Pradipika and the Shiva Samhita. It was written in the late 17th century and is organized into seven chapters and contains 351 shlokas (verses). [3] The Yoga Sūtras of Patañjali are 196 Indian sutras (aphorisms) compiled prior to 400 CE by Sage Patañjali, who took materials about Yoga from older traditions. [4] The five yamas listed by Patanjali are:&nbsp; 1) Ahiṃsa: Nonviolence, non-harming other living beings; 2) Satya: truthfulness, non-falsehood; 3) Asteya: non-stealing; 4) Brahmacharya: sexual restraint, marital fidelity and chastity.; 5) Aparigraha: non-avarice, non-possessiveness. [5] The five niyamas listed by Patanjali are:&nbsp; </sub><em><sub>1) Saucha</sub></em><sub>: purity, clearness of mind, speech and body; 2) </sub><em><sub>Santosha</sub></em><sub>: contentment, acceptance of the world, oneself and circumstances exactly as they are; 3) Tapas: austerity, intense self-discipline and willpower, even through discomfort; 4) </sub><em><sub>Svadhyaha</sub></em><sub>: study of self, self-reflection, introspection of self\'s thoughts, speeches and actions; 5) study of the self, which may include using philosophic sacred texts as a tool for introspection and self-reflection; </sub><em><sub>Ishvara Pranidhana</sub></em><sub>: surrender to and contemplation of the Divine or Supreme Consciousness, which includes dissolving ego and devoting one\'s work to the divine power.[6] Muktibodhananda, Swami. Hatha Yoga Pradipika. Yoga Publications Trust, Munger, Bihar, India. Commentary by Swami Muktibodhananda, Thomson Press (India), 1998, pp. 4-5.</sub></div>',
            'content_pt' => null,
            'author_id' => 1,
            'image_path' => 'app/demo/images/demo-2.jpg',
            'is_pinned' => true,
            'unique_token' => random_token()
        ]);

        \DB::table('article_article_topic')->insert(['article_id' => 2,'topic_id' => 1]);
        
        Article::create([
            'slug' => str_slug('How to master a Yoga posture?'),
            'title' => 'How to master a Yoga posture?',
            'title_pt' => 'Como aperfeiçoar uma postura do Yoga?',
            'content' => '<div>In Yoga philosophy, Hatha Yoga was designed to align the body, mind, and spirit for meditation. Through Yoga postures, you place your body in devotional positions aimed to cultivate concentration, balance, and relaxation to practice meditation.<br><br>When performing a Yoga posture, your body should be firm and relaxed. For this, breathing deeply and slowly through your nose is <em>fundamental. This will</em> allow your body and mind to release tensions and relax into the posture.<br><br>The breath and the mind are interdependent and intertwined. This means that once you control the <em>prana</em> (vital energy) through the breath, your mind is automatically controlled. As you control the breath, you train your mind to stay calm because you control the <em>prana</em>, which is what makes your mind moves.<br><br>As Patanjali explained: “Posture is mastered by releasing tension and meditating on the Unlimited.” (Sutra 2.74)&nbsp; In short, steady and comfortable posture comes through two means:</div><div><br></div><div>1. Letting go all tensions or efforts to stay in the pose<br><br></div><div>2. Focusing your mind and meditating on the infinite<br><br></div><div>As Patanjali taught: “Perfection in Asana is achieved when the effort to perform it becomes effortless and the infinite being within is reached.” (Sutra 2.42) As you learn to let your body go and surrender into the postures, you will experience each Asana as a prayer in motion, an opportunity to turn the mind\'s focus inwards and discover the innate wisdom of your body.<br><br>What is essential for the practice is a real spirit of devotion. Devotion leads you to a state of meditation while performing Yoga postures. Devotion can take us beyond technique, opening our hearts and our intuitive perception to understand Yoga on a deeper level.<br><br>Patanjali explains that when asanas are mastered, the yogi is not touched by the pairs of opposites. (Sutra 2.48). What does this mean?</div><div><br></div><div>We usually view ourselves as being apart from the world. We look at the world and the situations unfolding as being separate from us. This traditional idea of duality makes us believe that we are separate from the world, which becomes an object of our affections, anguish, dislike, judgments, etc.<br><br>When the Yoga posture is mastered, the yogi can overcome the barrier of duality to reach a higher level of consciousness.&nbsp; Then, it’s possible to experience a deep sense of rest and peace, like a deep sleep that makes you wake up fresh, feeling that your bodily and mental energies have energy has been restored and revitalized.<br><br><em>Mastery </em>of <em>Asana</em> comes therefore when you reach a state of “silence” or “emptiness” in the posture, allowing the harmony of the celestial spheres to come to you. Once you reach this state, you may feel like your body is being taken by the flow of the movements rather than you being the one making the moves. Once you reach that state your ego is no longer in command, and you are free to enjoy being in harmony with the whole.&nbsp;</div>',
            'content_pt' => null,
            'author_id' => 1,
            'image_path' => 'app/demo/images/demo-3.jpg',
            'unique_token' => random_token()
        ]);

        \DB::table('article_article_topic')->insert(['article_id' => 3,'topic_id' => 2]);
        
        Article::create([
            'slug' => str_slug('The importance of breath'),
            'title' => 'The importance of breath',
            'title_pt' => 'A importância da respiração',
            'content' => '<div>Breathing correctly during your practice will make you feel revitalized, while improper breathing can make you feel tired quickly.&nbsp; During your practice, you should always breathe through your nose, making sure your breath is slow, natural and gentle rather than forced and strained.&nbsp; A slow, rhythmic breath, synchronized with the movements will help to calm your mind and focus your practice. As your breathing becomes steady and smooth, so will your mind and your body’s movements.<br><br>Breathing deeply will allow the air into all parts of your lungs, keeping your oxygen intake high, which means supplying your whole body with oxygen, making you feel less tired. Deep breathing also encourages the detoxification process, which means you will be removing substances that are harmful to your body.&nbsp; Proper breathing makes you use the right set of muscles, which will also improve your posture, strengthening your <em>abdominal muscles</em> and relieving tension in your neck and back.<br><br>Once you get used to breathing correctly, your body will soon pick up the rhythm, and you will be able to do it in your everyday life. Without noticing, you will be automatically breathing correctly.</div>',
            'content_pt' => null,
            'author_id' => 1,
            'image_path' => 'app/demo/images/demo-4.jpg',
            'unique_token' => random_token()
        ]);

        \DB::table('article_article_topic')->insert(['article_id' => 4,'topic_id' => 3]);
    }
}
