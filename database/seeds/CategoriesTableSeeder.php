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
        	'description' => 'Hatha Yoga is often called Traditional or Classical Hatha Yoga. It focuses on the purification of the body and mind aiming for the spiritual development of the yogi.  A typical Hatha Yoga class is usually slowly-pace and brings the basic asanas (yoga postures) along with pranayamas (breathing exercises).',
        	'description_pt' => 'O Hatha Yoga é frequentemente chamado de Hatha Yoga Tradicional ou Clássico. Centra-se na purificação do corpo e da mente visando o desenvolvimento espiritual do praticante.',
        	'order' => 0
        ]);

        Category::create([
            'slug' => str_slug('Ashtanga Yoga'),
            'name' => 'Ashtanga Yoga',
            'name_pt' => 'Ashtanga Yoga',
            'subtitle' => 'Dynamic system with physically challenging sequences',
            'subtitle_pt' => 'Um sistema dinâmico com sequências fisicamente desafiadoras',
            'description' => 'Ashtanga is a dynamic system of yoga that was brought to the modern world by Sri K. Pattabhi Jois. Ashtanga Yoga is made up of six series (Primary, Intermediate and four Advanced Series), which the student progresses in difficulty through at their own pace.',
            'description_pt' => 'Ashtanga é um sistema dinâmico de Yoga que foi trazido para o mundo moderno por Sri K. Pattabhi Jois. O Ashtanga Yoga é composto por seis séries (Primária, Intermediária e Quatro Séries Avançadas), nas quais o aluno progride no seu próprio ritmo.',
            'order' => 1
        ]);
        
        Category::create([
            'slug' => str_slug('Yin yoga'),
            'name' => 'Yin yoga',
            'name_pt' => 'Yin yoga',
            'subtitle' => 'A gentle practice to improve flexibility and calm your body and mind',
            'subtitle_pt' => 'Uma prática gentil para melhorar a flexibilidade, acalmar o corpo e a mente',
            'description' => 'Yin Yoga is a slow-paced meditative style of Yoga with asanas that are held for longer periods of time, mainly on the floor. For beginners, it may range from 45 seconds to two minutes; advanced practitioners may stay in one asana for five minutes or more.',
            'description_pt' => 'Yin Yoga é um estilo meditativo e lento de Yoga com asanas que são mantidos por longos períodos de tempo, principalmente no solo. Para iniciantes, pode variar de 45 segundos a dois minutos em cada postura; praticantes avançados podem permanecer em um asana por cinco minutos ou mais.',
            'order' => 2
        ]);
        
        Category::create([
            'slug' => str_slug('Chair yoga'),
            'name' => 'Chair yoga',
            'name_pt' => 'Yoga na Cadeira',
            'subtitle' => 'A soft and gentle style to accommodate physical limitations or injuries',
            'subtitle_pt' => 'Um estilo suave para acomodar limitações físicas ou lesões',
            'description' => 'Chair yoga is a form of adaptative yoga that is practiced sitting on a chair, or standing using a chair for support. In a Chair Yoga class, asanas are modified and adapted to meet the needs of people who want to perform the poses more comfortably and safely. This gentle style of yoga is a great option not only for seniors, but also for young people who are recovering from illness, or have physical limitations that prevent them from being able to engage in regular Yoga practice.',
            'description_pt' => 'A maioria das posturas de Yoga podem ser modificadas para acomodar limitações ou lesões físicas. É por isso que mesmo indivíduos com deficiências ou condições crônicas de saúde podem se beneficiar da prática do Yoga.',
            'order' => 3
        ]);
        
        Category::create([
            'slug' => str_slug('Restorative Yoga'),
            'name' => 'Restorative Yoga',
            'name_pt' => 'Yoga restaurativa',
            'subtitle' => 'Well-supported asanas that offer the opportunity to relax',
            'subtitle_pt' => 'Um método de Yoga terapêutico que busca o relaxamento profundo da mente e do corpo',
            'description' => 'Restorative Asanas are well-supported poses offer the body the chance to concentrate on the stress stored in your body and release. These postures are an excellent choice to increase your flexibility safely and enhance your immune system through deep relaxation. Restorative poses help to treat and heal emotional pain, bringing physical and mental balance.',
            'description_pt' => 'Uma sequência de Yoga Restaurativa típica tem apenas cerca de cinco posturas, com apoio de acessórios que permitem ao praticante relaxar e descansar confortavelmente. Este é um tipo de aula que oferece a chance de perceber o estresse armazenado em seu corpo e liberá-lo.',
            'order' => 4
        ]);
        
        Category::create([
            'slug' => str_slug('Vinyasa flow'),
            'name' => 'Vinyasa flow',
            'name_pt' => 'Fluxo Vinyasa',
            'subtitle' => 'The art of effortless flow',
            'subtitle_pt' => 'A arte do fluxo sem esforço',
            'description' => 'Vinyasa is a general term that describes many different styles of yoga. It means movement synchronized with breath and describes a vigorous style of class based on a  continuous flow from one posture to the next.',
            'description_pt' => 'Vinyasa é um termo geral que descreve muitos estilos diferentes de Yoga. Significa movimento sincronizado com a respiração e descreve um estilo vigoroso de aula baseado em um fluxo contínuo de uma postura para a outra.',
            'order' => 5
        ]);
        
        Category::create([
            'slug' => str_slug('Yoga Therapy'),
            'name' => 'Yoga Therapy',
            'name_pt' => 'Yoga terapêutica',
            'subtitle' => 'Healing through Yoga',
            'subtitle_pt' => 'Um suporte terapêutico para prevenir e tratar doenças em vários níveis',
            'description' => 'Yoga therapy is emerging as an effective treatment for several health conditions such as stress, chronic pain, Post-Traumatic Stress Disorder (PTSD), insomnia, infertility, diabetes, allergies, asthma, osteoporosis, fatigue, depression, anxiety, low self-esteem, drug addiction, and migraines.',
            'description_pt' => 'Além de sua filosofia espiritual, o Yoga tem sido usado como suporte terapêutico para prevenir e tratar doenças em vários níveis. O Yoga Terapêutico ou Yogaterapia é uma prática que incentiva a integração do corpo e da mente, usando asanas, pranayamas e meditação como método de cura, para melhorar a saúde mental e física.',
            'order' => 6
        ]);
        
        Category::create([
            'slug' => str_slug('Pranayamas'),
            'name' => 'Pranayamas',
            'name_pt' => 'Pranayamas',
            'subtitle' => 'Controlling the mind through the breath',
            'subtitle_pt' => 'Controlando a mente através da respiração',
            'description' => 'The word pranayama derives from two Sanskrit words: praṇa and ayama. The first, prana, meaning life force, and the second, ayama, meaning control. Thus, pranayama is the control of the movement of prana (life force) through breath regulation.',
            'description_pt' => 'A palavra pranayama deriva de duas palavras em sânscrito: praṇa e ayama. O primeiro, prana, significa força vital, e o segundo, ayama, significa controle. Assim, pranayama é o controle do movimento do prana (força vital) através da regulação da respiração.',
            'order' => 7
        ]);
        
        Category::create([
            'slug' => str_slug('Meditation'),
            'name' => 'Meditation',
            'name_pt' => 'Meditação',
            'subtitle' => 'A practice that purifies and transforms the mind',
            'subtitle_pt' => 'Uma prática que purifica e transforma a mente',
            'description' => 'Meditation teaches us mental discipline, bringing inner balance, emotional positivity, and peace. It is from that state of harmony and silence that your mental strength and inner divine force within can arise. Gradually, it brings physical and emotional bliss, like a deep sleep that makes us wake up fresh, feeling that our bodily and mental energy has been restored and revitalized.',
            'description_pt' => 'A meditação nos ensina a disciplinar a mente, trazendo equilíbrio interior, positividade emocional e paz. É desse estado de harmonia e silêncio que a sua força mental e a divina força interior podem surgir. Gradualmente, a prática da meditação traz felicidade física e emocional, como um sono profundo que nos faz despertar novamente, sentindo que nossa energia corporal e mental foi restaurada e revitalizada.',
            'order' => 8
        ]);
        
        Category::create([
            'slug' => str_slug('Office Yoga'),
            'name' => 'Office Yoga',
            'name_pt' => 'Yoga no Trabalho',
            'subtitle' => 'Practice while you´re at work so you can perform at your best',
            'subtitle_pt' => 'Pratique no trabalho para alcançar seu melhor desempenho',
            'description' => 'Office yoga is designed to be done while you are working at an office. Office yoga includes breath exercises, some asanas adapted for the office and meditation. It can be done in a single session or several mini sessions throughout the day. Practicing regularly it will help you prevent injuries and clear your mind so you can perform at your best.',
            'description_pt' => 'Yoga no Trabalho é uma modalidade de Yoga projetada para ser praticada no período em que  você está em um escritório trabalhando. Podendo ser realizada  em uma única sessão ou em várias sessões curtas ao longo do dia. A prática da Yoga no Trabalho inclui pranayamas (exercícios de respiração), alguns asanas (posturas de Yoga) adaptados para o escritório, mudras (gestos espirituais) e meditação.',
            'order' => 9
        ]);
      
        Category::create([
            'slug' => str_slug('Yoga Philosophy'),
            'name' => 'Yoga Philosophy',
            'name_pt' => 'Yoga Filosofia',
            'subtitle' => 'A journey to the spiritual dimension of Yoga',
            'subtitle_pt' => 'Uma jornada para a dimensão espiritual do Yoga',
            'description' => 'Have you ever asked: Who am I? Why am I here? Where am I going to? Answering questions like that seem to lie just beyond our reach. Yoga philosophy offers a new perspective on yourself and the world around you, taking you beyond the physical aspect of Yoga and providing a deeper understanding of the spiritual aspect of the practice. Learning to integrate philosophy with your practice will help you develop inner peace and connect the mind, body, and spirit to realize your true nature.',
            'description_pt' => 'Você já se perguntou: quem sou eu? Por que estou aqui? Para onde eu vou? Responder a perguntas como essas  parece estar além do nosso alcance. A filosofia do Yoga oferece uma nova perspectiva sobre você e o mundo ao seu redor, te levando além do aspecto físico do Yoga e proporcionando uma compreensão mais profunda do aspecto espiritual da prática. Aprender a integrar a filosofia à prática o ajudará a desenvolver a paz interior e a conectar a mente, o corpo e o espírito para descobrir sua verdadeira natureza, que é divina.',
            'order' => 10
        ]);
    }
}