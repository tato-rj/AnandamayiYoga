<?php

use Illuminate\Database\Seeder;
use App\Teacher;

class TeachersTableSeeder extends Seeder
{
    public function run()
    {
        Teacher::create([
            'slug' => 'anandamayi',
        	'name' => 'Anandamayi',
            'image_path' => 'app/avatars/default/main.jpg',
        	'cover_path' => 'app/covers/anandamayi.jpg',
        	'email' => 'contact@anandamayiyoga.com',
        	'biography' => '<div><strong>Anandamayi</strong> is a Yoga teacher certified through the International Sivananda Yoga Teachers Training Course (TTC), which shares the teachings of classical Hatha Yoga and Vedanta (Yoga Philosophy) as a means for all to achieve physical, mental and spiritual wellbeing, and self-realization. She completed the Course in 2017 at Sivananda Ashram Yoga Camp in Val-Morin, Quebec (Canada). In 2018 she completed Advanced Teacher Tanning course (ATTC), which allows graduates from the Sivananda Yoga Teachers Training Course (TTC) to deepen their spiritual practice and study of Hatha Yoga, Vedanta philosophy, Raja Yoga, Anatomy, and Sanskrit. She is currently a Registered Yoga Teacher (RYT) with Yoga Alliance Foundation (YA ID: 249811 - E-RYT 500), which acknowledges the completion of a yoga teacher training with a Registered Yoga School (RYS).<br><br>Anandamayi is the founder of ANANDAMAYIYOGA, an online platform to make Yoga at home easy for people from all around the world. The platform offers classes of several styles, meditation and lecture classes. It is also an online teaching resource with information about Yoga Philosophy, Yoga Therapy, Pranayamas, Asanas and Meditation.<br><br>She has authored several articles and the following books: “The Sun Salutation: a guide to turning your practice into a deep meditation”, “The 32 Fundamental Asanas and their variations”, and “The 47 life benefits of Yoga: achieving self-development in physical, mental and spiritual levels”.</div>',
            'biography_pt' => '<div><strong>Anandamayi</strong> é professora de Yoga certificada pelo Curso Internacional de Formação de Professores Sivananda Yoga (TTC), que compartilha ensinamentos de Hatha Yoga e Vedanta (Filosofia do Yoga) como um meio para alcançar o bem-estar físico, mental, espiritual e a auto realização.<br><br>Em 2018, concluiu a Formação Avançada para Professores  (ATTC), que permite aos professores graduados aprofundarem sua prática espiritual e estudar Hatha Yoga, Filosofia Vedanta, Raja Yoga, Anatomia e Sânscrito. Ela completou ambos os cursos no Ashram Sivananda Yoga Camp, em Val-Morin, Quebec (Canadá). Atualmente ministra aulas de Yoga como professora registrada pela Fundação Yoga Alliance (YA ID: 249811- E-RYT 500), que reconhece a certificação de professores de Yoga em Escolas de Yoga Registradas (RYS).<br><br>Anandamayi é autora de diversos artigos e dos livros: “Saudação ao Sol: um guia para transformar sua prática em uma meditação em movimento”, “Os 32 Asanas Fundamentais e suas variações” e “Os 46 benefícios do Yoga: autorealização física, mental e espiritual”.<br><br>Anandamayi é a fundadora da ANANDAMAYIYOGA, uma plataforma online que trabalha no sentido de facilitar o acesso de praticantes de nível básico, intermediário e avançado ao imenso arcabouço de ensinamentos do Yoga. A plataforma oferece cursos e palestras que contemplam os diversos estilos do Yoga e suas aplicações, Filosofia do Yoga, Terapia do Yoga, Pranayamas, Asanas e Meditação.</div>'
        ]);
    }
}