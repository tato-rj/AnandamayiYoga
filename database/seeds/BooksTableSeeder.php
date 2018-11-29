<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
    	Book::create([
    		'title' => 'Sun Salutation',
            'subtitle' => 'a guide to turn your practice into a moving meditation',
    		'description' => '<div>Sun Salutation or Surya Namaskar is a sequence of gracefully linked Yoga postures (asanas) performed in a continuous flow along with breath control. In Sanskrit, Surya means “sun” and Namaskar means “to bow down”. Thus, Surya Namaskar is a devotional practice of bowing down to the sun, this light-bringer and most important source of energy for life on planet Earth.<br><br>The Sun Salutation practice started during the Vedic period (c. 1500 – c. 600 BCE). Back then, ancient rituals were done outdoors facing east at sunrise and sunset, with lots of mantras from the Vedas (sacred texts of early Hinduism).<br><br>However, somewhere along the way, the essential part of the original Namaskar sequence was lost: the understanding of the practice as a moving meditation to connect with the sun\'s nourishing energy, a source of wisdom, health, mental clarity, and creativity. Many Yoga practitioners use this elevated practice only as a warm-up exercise to start classes, abandoning the original meaning of the sequence.<br><br>This book is a guide for you to understand the essence of the Sun Salutations as a devotional moving meditation. As you learn to perform the Sun Salutation as a moving meditation, you flow into the harmony of the celestial spheres, raising your state of consciousness and awakening your inner sun. Each asana becomes a gateway to align yourself with the divine geometry, leading you to acquire the characteristics of order and divinity.</div>',
    		'lang' => 'en',
    		'image_path' => 'app/demo/books/sun-salutation.jpg'
    	]);

    	Book::create([
    		'title' => 'The 46 Benefits of Yoga',
            'subtitle' => 'taking care of your physical, mental and spiritual health',
    		'description' => trixLorem(3),
    		'lang' => 'en',
    		'image_path' => 'app/demo/books/benefits.jpg'
    	]);
    }
}
