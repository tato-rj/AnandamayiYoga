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
        	'biography' => '<div><strong>Anandamayi</strong> is a Yoga teacher certified through International Sivananda Yoga Teachers Training Course (TTC) which shares teachings of classical Hatha Yoga and Vedanta (Yoga Philosophy) as a means for all to achieve physical, mental and spiritual wellbeing, and self-realization. She completed the Course in 2017 at Sivananda Ashram Yoga Camp in Val-Morin, Quebec (Canada). In 2018 she completed Advanced Teacher Tanning course (ATTC), which allows graduates from the Sivananda Yoga Teachers Training Course (TTC) to deepen their spiritual practice and study of Hatha Yoga, Vedanta philosophy, Raja Yoga, Anatomy, and Sanskrit. She is currently a Registered Yoga Teacher (RYT) with Yoga Alliance Foundation (YA ID: 249811 - E-RYT 500), which acknowledges the completion of a yoga teacher training with a Registered Yoga School (RYS).<br><br>Anandamayi is the founder of ANANDAMAYIYOGA, an online platform to make Yoga at home easy for people from all around the world. The platform offers classes of several styles, meditation and lecture classes. It is also an online teaching resource with information about Yoga Philosophy, Yoga Therapy, Pranayamas, Asanas and Meditation.<br><br>She has authored several articles and the following books: “The Sun Salutation: a guide to turning your practice into a deep meditation”, “The 32 Fundamental Asanas and their variations”, and “The 47 life benefits of Yoga: achieving self-development in physical, mental and spiritual levels”.</div>'
        ]);
    }
}