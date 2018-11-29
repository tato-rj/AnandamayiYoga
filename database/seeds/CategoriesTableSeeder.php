<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create([
        	'slug' => str_slug('Hatha Yoga'),
        	'name' => 'Hatha Yoga',
        	'name_pt' => 'Hatha Yoga',
        	'subtitle' => 'A slowly-paced style that balances and heals the body and mind',
        	'subtitle_pt' => 'Um estilo com ritmo lento que equilibra e cura o corpo e a mente',
        	'short_description' => 'Hatha Yoga is often called Traditional or Classical Hatha Yoga. It focuses on the purification of the body and mind aiming for the spiritual development of the yogi.  A typical Hatha Yoga class is usually slowly-pace and brings the basic asanas (yoga postures) along with pranayamas (breathing exercises).',
        	'short_description_pt' => 'O Hatha Yoga é frequentemente chamado de Hatha Yoga Tradicional ou Clássico. Centra-se na purificação do corpo e da mente visando o desenvolvimento espiritual do praticante.',
            'long_description' => '<div>Hatha Yoga is often called Traditional or Classical Hatha Yoga. It focuses on the purification of the body and mind aiming for the spiritual development of the yogi. A typical Hatha Yoga class is usually slowly-pace and brings the basic asanas (yoga postures) along with pranayamas (breathing exercises).<br><br>Hatha is a Sanskrit word that can be broken down into two smaller words: ha, meaning “sun,” and tha, meaning “moon.” The word Hatha also means “willful” or "forceful” and thus refers to a system of physical techniques to balances the flow of energies of the body, leading to physical health, mental stability, and spiritual development. In Yoga philosophy, Hatha yoga was originally indicated as a preparation for Raja-Yoga. Hatha Yoga is the first part of Raja Yoga because it prepares the body and mind for the higher conscious states.<br><br>Hatha yoga uses prana as a means to reach higher states of consciousness and realize the Self. It gives us a way to redirect the vital life force (prana) from the lower to the higher centers. The practices in Hatha Yoga which consist of the asanas (physical postures), pranayama (breathing exercises), mudras, bandhas (the "body locks") and shatkarmas (cleansing practices), balance the energies in the body, healing the body and mind.</div>',
        	'order' => 0
        ]);

        Category::create([
            'slug' => str_slug('Ashtanga Yoga'),
            'name' => 'Ashtanga Yoga',
            'name_pt' => 'Ashtanga Yoga',
            'subtitle' => 'Dynamic system with physically challenging sequences',
            'subtitle_pt' => 'Um sistema dinâmico com sequências fisicamente desafiadoras',
            'short_description' => 'Ashtanga is a dynamic system of yoga that was brought to the modern world by Sri K. Pattabhi Jois. Ashtanga Yoga is made up of six series (Primary, Intermediate and four Advanced Series), which the student progresses in difficulty through at their own pace.',
            'short_description_pt' => 'Ashtanga é um sistema dinâmico de Yoga que foi trazido para o mundo moderno por Sri K. Pattabhi Jois. O Ashtanga Yoga é composto por seis séries (Primária, Intermediária e Quatro Séries Avançadas), nas quais o aluno progride no seu próprio ritmo.',
            'long_description' => '<div>Ashtanga is a dynamic system of yoga that was brought to the modern world by Sri K. Pattabhi Jois. Ashtanga Yoga is made up of six series (Primary, Intermediate and four Advanced Series), which the student progresses in difficulty through at their own pace.<br><br>Ashtanga yoga is a vigorous practice with physically challenging sequences. The practitioner is encouraged to memorize the series and is necessary to master each pose before moving on to the next.</div>',
            'order' => 1
        ]);
        
        Category::create([
            'slug' => str_slug('Yin yoga'),
            'name' => 'Yin yoga',
            'name_pt' => 'Yin yoga',
            'subtitle' => 'A gentle practice to improve flexibility and calm your body and mind',
            'subtitle_pt' => 'Uma prática gentil para melhorar a flexibilidade, acalmar o corpo e a mente',
            'short_description' => 'Yin Yoga is a slow-paced meditative style of Yoga with asanas that are held for longer periods of time, mainly on the floor. For beginners, it may range from 45 seconds to two minutes; advanced practitioners may stay in one asana for five minutes or more.',
            'short_description_pt' => 'Yin Yoga é um estilo meditativo e lento de Yoga com asanas que são mantidos por longos períodos de tempo, principalmente no solo. Para iniciantes, pode variar de 45 segundos a dois minutos em cada postura; praticantes avançados podem permanecer em um asana por cinco minutos ou mais.',
            'long_description' => '<div>Yin Yoga is is a slow-paced meditative style of Yoga with asanas that are held for longer periods of time, mainly on the floor. For beginners, it may range from 45 seconds to two minutes; advanced practitioners may stay in one asana for five minutes or more.<br><br>Yin Yoga is based on the Taoist concepts of yin and yang, opposite and complementary principles in nature. It is a very gentle practice that enables you to experience meditation in motion, calming and balancing the mind and nervous system, regulating the body\'s flow of energy.<br><br>In Yin yoga classes your learn the art of letting go every effort, which gives your body the opportunity to relax and release tensions, resulting in increased circulation, greater joint mobility, and improved flexibility. In this slow and meditative practice, you will be shifting your focus inwards and listening to your body to find your inner strength.</div>',
            'order' => 2
        ]);
        
        Category::create([
            'slug' => str_slug('Chair yoga'),
            'name' => 'Chair yoga',
            'name_pt' => 'Yoga na Cadeira',
            'subtitle' => 'A soft and gentle style to accommodate physical limitations or injuries',
            'subtitle_pt' => 'Um estilo suave para acomodar limitações físicas ou lesões',
            'short_description' => 'Chair yoga is a form of adaptative yoga that is practiced sitting on a chair, or standing using a chair for support. In a Chair Yoga class, asanas are modified and adapted to meet the needs of people who want to perform the poses more comfortably and safely. This gentle style of yoga is a great option not only for seniors, but also for young people who are recovering from illness, or have physical limitations that prevent them from being able to engage in regular Yoga practice.',
            'short_description_pt' => 'A maioria das posturas de Yoga podem ser modificadas para acomodar limitações ou lesões físicas. É por isso que mesmo indivíduos com deficiências ou condições crônicas de saúde podem se beneficiar da prática do Yoga.',
            'long_description' => '<div>Most Yoga postures can be modified to accommodate physical limitations or injuries. That is why even individuals with disabilities or chronic health conditions can benefit from Yoga practice.<br><br>Chair yoga is a form of adaptative yoga that is practiced sitting on a chair, or standing using a chair for support. In a Chair Yoga class, asanas are modified and adapted to meet the needs of people who want to perform the poses more comfortably and safely. This gentle style of yoga is a great option not only for seniors, but also for young people who are recovering from illness, or have physical limitations that prevent them from being able to engage in regular Yoga practice.<br><br>As you start your adaptive Yoga practice, you should always listen to your body, moving gently and within your body’s limits. Listen carefully to your teacher’s instructions and perform the postures as correctly as possible, always respecting your physical limitations. Verify that your body is aligned and you are feeling the stretches in the right places. Make sure you are not exceeding your limits.</div>',
            'order' => 3
        ]);
        
        Category::create([
            'slug' => str_slug('Restorative Yoga'),
            'name' => 'Restorative Yoga',
            'name_pt' => 'Yoga restaurativa',
            'subtitle' => 'Well-supported asanas that offer the opportunity to relax',
            'subtitle_pt' => 'Um método de Yoga terapêutico que busca o relaxamento profundo da mente e do corpo',
            'short_description' => 'Restorative Asanas are well-supported poses offer the body the chance to concentrate on the stress stored in your body and release. These postures are an excellent choice to increase your flexibility safely and enhance your immune system through deep relaxation. Restorative poses help to treat and heal emotional pain, bringing physical and mental balance.',
            'short_description_pt' => 'Uma sequência de Yoga Restaurativa típica tem apenas cerca de cinco posturas, com apoio de acessórios que permitem ao praticante relaxar e descansar confortavelmente. Este é um tipo de aula que oferece a chance de perceber o estresse armazenado em seu corpo e liberá-lo.',
            'long_description' => '<div>Restorative Asanas are well-supported poses offer the body the chance to concentrate on the stress stored in your body and release. These postures are an excellent choice to increase your flexibility safely and enhance your immune system through deep relaxation. Restorative poses help to treat and heal emotional pain, bringing physical and mental balance.</div>',
            'order' => 4
        ]);
        
        Category::create([
            'slug' => str_slug('Vinyasa flow'),
            'name' => 'Vinyasa flow',
            'name_pt' => 'Fluxo Vinyasa',
            'subtitle' => 'The art of effortless flow',
            'subtitle_pt' => 'A arte do fluxo sem esforço',
            'short_description' => 'Vinyasa is a general term that describes many different styles of yoga. It means movement synchronized with breath and describes a vigorous style of class based on a  continuous flow from one posture to the next.',
            'short_description_pt' => 'Vinyasa é um termo geral que descreve muitos estilos diferentes de Yoga. Significa movimento sincronizado com a respiração e descreve um estilo vigoroso de aula baseado em um fluxo contínuo de uma postura para a outra.',
            'long_description' => '<div>Vinyasa is a general term that describes many different styles of yoga. It means movement synchronized with breath and describes a vigorous style of class based on a  continuous flow from one posture to the next.</div>',
            'order' => 5
        ]);
        
        Category::create([
            'slug' => str_slug('Yoga Therapy'),
            'name' => 'Yoga Therapy',
            'name_pt' => 'Yoga terapêutica',
            'subtitle' => 'Healing through Yoga',
            'subtitle_pt' => 'Um suporte terapêutico para prevenir e tratar doenças em vários níveis',
            'short_description' => 'Yoga therapy is emerging as an effective treatment for several health conditions such as stress, chronic pain, Post-Traumatic Stress Disorder (PTSD), insomnia, infertility, diabetes, allergies, asthma, osteoporosis, fatigue, depression, anxiety, low self-esteem, drug addiction, and migraines.',
            'short_description_pt' => 'Além de sua filosofia espiritual, o Yoga tem sido usado como suporte terapêutico para prevenir e tratar doenças em vários níveis. O Yoga Terapêutico ou Yogaterapia é uma prática que incentiva a integração do corpo e da mente, usando asanas, pranayamas e meditação como método de cura, para melhorar a saúde mental e física.',
            'long_description' => '<div>Yoga therapy encourages the integration of the body and mind, using asanas, pranayamas, and meditation as a healing method, to improve mental and physical health.<br><br>Yoga therapy is emerging as an effective treatment for several health conditions such as stress, chronic pain, Post-Traumatic Stress Disorder (PTSD), insomnia, infertility, diabetes, allergies, asthma, osteoporosis, fatigue, depression, anxiety, low self-esteem, drug addiction, and migraines.</div>',
            'order' => 6
        ]);
        
        Category::create([
            'slug' => str_slug('Pranayamas'),
            'name' => 'Pranayamas',
            'name_pt' => 'Pranayamas',
            'subtitle' => 'Controlling the mind through the breath',
            'subtitle_pt' => 'Controlando a mente através da respiração',
            'short_description' => 'The word pranayama derives from two Sanskrit words: praṇa and ayama. The first, prana, meaning life force, and the second, ayama, meaning control. Thus, pranayama is the control of the movement of prana (life force) through breath regulation.',
            'short_description_pt' => 'A palavra pranayama deriva de duas palavras em sânscrito: praṇa e ayama. O primeiro, prana, significa força vital, e o segundo, ayama, significa controle. Assim, pranayama é o controle do movimento do prana (força vital) através da regulação da respiração.',
            'long_description' => '<div>The word pranayama derives from two Sanskrit words: praṇa and ayama. The first, prana, meaning life force, and the second, ayama, meaning control. Thus, pranayama is the control of the movement of prana (life force) through breath regulation.<br><br>The breath and the mind are interdependent and intertwined. Once you control the prana through the breath, your mind is automatically controlled. As you control the breath, you train your mind to stay calm because you control the prana, which is what makes your mind moves. In short, pranayama is a tool to control the mind because teaches us to control the life force that sets the mind in motion.<br><br>Pranayama practice helps to clean up the energy channels in the body (nadis), allowing the pranic energy to flow. Pranayama is practiced to control the pranic energy in the body. It increases life force in the body, redirecting the prana from the lower to the higher centers.<br><br>Through pranayamas, mudras, bandhas, and asanas, the prana is regulated, and the mind is controlled. By developing concentration or one-pointedness of mind one experiences peace and harmony. The vital energy in the body is amplified and stimulated  to reach a higher frequency, which leads the mind to higher states of consciousness, greater mental power, and physical energy.</div>',
            'order' => 7
        ]);
        
        Category::create([
            'slug' => str_slug('Meditation'),
            'name' => 'Meditation',
            'name_pt' => 'Meditação',
            'subtitle' => 'A practice that purifies and transforms the mind',
            'subtitle_pt' => 'Uma prática que purifica e transforma a mente',
            'short_description' => 'Meditation teaches us mental discipline, bringing inner balance, emotional positivity, and peace. It is from that state of harmony and silence that your mental strength and inner divine force within can arise. Gradually, it brings physical and emotional bliss, like a deep sleep that makes us wake up fresh, feeling that our bodily and mental energy has been restored and revitalized.',
            'short_description_pt' => 'A meditação nos ensina a disciplinar a mente, trazendo equilíbrio interior, positividade emocional e paz. É desse estado de harmonia e silêncio que a sua força mental e a divina força interior podem surgir. Gradualmente, a prática da meditação traz felicidade física e emocional, como um sono profundo que nos faz despertar novamente, sentindo que nossa energia corporal e mental foi restaurada e revitalizada.',
            'long_description' => '<div>Meditation teaches us mental discipline, bringing inner balance, emotional positivity, and peace. It is from that state of harmony and silence that your mental strength and inner divine force within can arise. Gradually, it brings physical and emotional bliss, like a deep sleep that makes us wake up fresh, feeling that our bodily and mental energy has been restored and revitalized.<br><br>Whether still or moving, meditation is a practice that purifies and transforms the mind, invoking a shift in our consciousness to a higher state.</div>',
            'order' => 8
        ]);
        
        Category::create([
            'slug' => str_slug('Office Yoga'),
            'name' => 'Office Yoga',
            'name_pt' => 'Yoga no Trabalho',
            'subtitle' => 'Practice while you´re at work so you can perform at your best',
            'subtitle_pt' => 'Pratique no trabalho para alcançar seu melhor desempenho',
            'short_description' => 'Office yoga is designed to be done while you are working at an office. Office yoga includes breath exercises, some asanas adapted for the office and meditation. It can be done in a single session or several mini sessions throughout the day. Practicing regularly it will help you prevent injuries and clear your mind so you can perform at your best.',
            'short_description_pt' => 'Yoga no Trabalho é uma modalidade de Yoga projetada para ser praticada no período em que  você está em um escritório trabalhando. Podendo ser realizada  em uma única sessão ou em várias sessões curtas ao longo do dia. A prática da Yoga no Trabalho inclui pranayamas (exercícios de respiração), alguns asanas (posturas de Yoga) adaptados para o escritório, mudras (gestos espirituais) e meditação.',
            'long_description' => '<div>Office yoga is designed to be done while you are working at an office. Office yoga includes breath exercises, some asanas adapted for the office and meditation. It can be done in a single session or several mini sessions throughout the day. Practicing regularly it will help you prevent injuries and clear your mind so you can perform at your best.<br><br>Sitting places more stress on your spinal discs than standing. All sitting for prolonged periods of time compresses your spine because you are adding a tremendous amount of pressure to your back muscles and spinal discs.<br><br>Sitting in a slouched position can overstretch the muscles and ligaments and strain the spinal discs. But even if you have good posture habits, you will need a break to relieve tightness and muscle tension in the back, neck, shoulders, and hips. A five-minute office yoga break can help to fix poor posture habits and soreness, revitalizing your body and mind.</div>',
            'order' => 9
        ]);
      
        Category::create([
            'slug' => str_slug('Yoga Philosophy'),
            'name' => 'Yoga Philosophy',
            'name_pt' => 'Filosofia do Yoga',
            'subtitle' => 'A journey to the spiritual dimension of Yoga',
            'subtitle_pt' => 'Uma jornada para a dimensão espiritual do Yoga',
            'short_description' => 'Have you ever asked: Who am I? Why am I here? Where am I going to? Answering questions like that seem to lie just beyond our reach. Yoga philosophy offers a new perspective on yourself and the world around you, taking you beyond the physical aspect of Yoga and providing a deeper understanding of the spiritual aspect of the practice. Learning to integrate philosophy with your practice will help you develop inner peace and connect the mind, body, and spirit to realize your true nature.',
            'short_description_pt' => 'Você já se perguntou: quem sou eu? Por que estou aqui? Para onde eu vou? Responder a perguntas como essas  parece estar além do nosso alcance. A filosofia do Yoga oferece uma nova perspectiva sobre você e o mundo ao seu redor, te levando além do aspecto físico do Yoga e proporcionando uma compreensão mais profunda do aspecto espiritual da prática. Aprender a integrar a filosofia à prática o ajudará a desenvolver a paz interior e a conectar a mente, o corpo e o espírito para descobrir sua verdadeira natureza, que é divina.',
            'long_description' => '<div>Have you ever asked: Who am I? Why am I here? Where am I going to? Answering questions like that seem to lie just beyond our reach. Yoga philosophy offers a new perspective on yourself and the world around you, taking you beyond the physical aspect of Yoga and providing a deeper understanding of the spiritual aspect of the practice. Learning to integrate philosophy with your practice will help you develop inner peace and connect the mind, body, and spirit to realize your true nature.</div>',
            'order' => 10
        ]);
    }
}