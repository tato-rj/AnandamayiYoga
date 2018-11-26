<?php

use Illuminate\Database\Seeder;
use App\Asana;

class AsanasTableSeeder extends Seeder
{
    public function run()
    {
    	Asana::create([
    		'slug' => str_slug('Mountain Pose'),
    		'name' => 'Mountain Pose',
    		'sanskrit' => 'Tadasana',
    		'etymology' => 'Tada (mountain) + asana (posture)',
    		'image_path' => 'app/demo/images/asana-1.jpg'
    	]);

        \DB::table('asana_asana_type')->insert(['asana_id' => 1,'asana_type_id' => 1]);
        \DB::table('asana_asana_sub_type')->insert(['asana_id' => 1,'asana_sub_type_id' => 6]);
        \DB::table('asana_level')->insert(['level_id' => 1,'asana_id' => 1]);

    	Asana::create([
    		'slug' => str_slug('Prayer Pose'),
    		'name' => 'Prayer Pose',
    		'sanskrit' => 'Pranamasana',
    		'etymology' => 'pranam (absolute) +asana (posture)',
    		'image_path' => 'app/demo/images/asana-2.jpg'
    	]);

        \DB::table('asana_asana_type')->insert(['asana_id' => 2,'asana_type_id' => 1]);
        \DB::table('asana_asana_sub_type')->insert(['asana_id' => 2,'asana_sub_type_id' => 6]);
        \DB::table('asana_level')->insert(['level_id' => 1,'asana_id' => 2]);

    	Asana::create([
    		'slug' => str_slug('Standing Forward Bend'),
    		'name' => 'Standing Forward Bend',
    		'sanskrit' => 'Padahastasana',
    		'etymology' => 'pada (foot) + hasta (hand) + asana (posture)',
    		'image_path' => 'app/demo/images/asana-3.jpg'
    	]);

        \DB::table('asana_asana_type')->insert(['asana_id' => 3,'asana_type_id' => 1]);
        \DB::table('asana_asana_sub_type')->insert(['asana_id' => 3,'asana_sub_type_id' => 1]);
        \DB::table('asana_level')->insert(['level_id' => 1,'asana_id' => 3]);

    	Asana::create([
    		'slug' => str_slug('Halfway Lift'),
    		'name' => 'Halfway Lift',
    		'sanskrit' => 'Ardha Uttānāsana',
    		'etymology' => 'ardha (half) + uttāna (stretch out) + āsana (posture)',
    		'image_path' => 'app/demo/images/asana-4.jpg'
    	]);

        \DB::table('asana_asana_type')->insert(['asana_id' => 4,'asana_type_id' => 1]);
        \DB::table('asana_asana_sub_type')->insert(['asana_id' => 4,'asana_sub_type_id' => 1]);
        \DB::table('asana_level')->insert(['level_id' => 1,'asana_id' => 4]);

    	Asana::create([
    		'slug' => str_slug('Chair Pose'),
    		'name' => 'Chair Pose',
    		'sanskrit' => 'Utkatasana',
    		'etymology' => 'utkaṭa (fierce) + āsana (posture)',
    		'image_path' => 'app/demo/images/asana-5.jpg'
    	]);

        \DB::table('asana_asana_type')->insert(['asana_id' => 5,'asana_type_id' => 1]);
        \DB::table('asana_asana_sub_type')->insert(['asana_id' => 5,'asana_sub_type_id' => 6]);
        \DB::table('asana_level')->insert(['level_id' => 1,'asana_id' => 5]);

    	Asana::create([
    		'slug' => str_slug('Cobra Pose'),
    		'name' => 'Cobra Pose',
    		'sanskrit' => 'Bhujangasana',
    		'etymology' => 'bhujaṅga (serpent) + āsana (posture)',
    		'image_path' => 'app/demo/images/asana-6.jpg'
    	]);

        \DB::table('asana_asana_type')->insert(['asana_id' => 6,'asana_type_id' => 4]);
        \DB::table('asana_asana_sub_type')->insert(['asana_id' => 6,'asana_sub_type_id' => 3]);
        \DB::table('asana_level')->insert(['level_id' => 2,'asana_id' => 6]);

    	Asana::create([
    		'slug' => str_slug('Equestrian pose'),
    		'name' => 'Equestrian pose',
    		'sanskrit' => 'Ashwa Sanchalanasana',
    		'etymology' => 'Ashwa (horse) + sanchalana (stepping movement)',
    		'image_path' => 'app/demo/images/asana-7.jpg'
    	]);

        \DB::table('asana_asana_type')->insert(['asana_id' => 7,'asana_type_id' => 5]);
        \DB::table('asana_asana_sub_type')->insert(['asana_id' => 7,'asana_sub_type_id' => 5]);
        \DB::table('asana_level')->insert(['level_id' => 1,'asana_id' => 7]);

    	Asana::create([
    		'slug' => str_slug('Inverted V'),
    		'name' => 'Inverted V',
    		'sanskrit' => 'Parvatasana',
    		'etymology' => 'parvata (mountain) + asana (pose)',
    		'image_path' => 'app/demo/images/asana-8.jpg'
    	]);

        \DB::table('asana_asana_type')->insert(['asana_id' => 8,'asana_type_id' => 5]);
        \DB::table('asana_asana_sub_type')->insert(['asana_id' => 8,'asana_sub_type_id' => 1]);
        \DB::table('asana_level')->insert(['level_id' => 1,'asana_id' => 8]);

    	Asana::create([
    		'slug' => str_slug('Salutation with eight limbs'),
    		'name' => 'Salutation with eight limbs',
    		'sanskrit' => 'Ashtanga Namaskara',
    		'etymology' => 'ashta (eight) + anga (part or limb), +namaskar (bow)',
    		'image_path' => 'app/demo/images/asana-9.jpg'
    	]);

        \DB::table('asana_asana_type')->insert(['asana_id' => 9,'asana_type_id' => 4]);
        \DB::table('asana_asana_sub_type')->insert(['asana_id' => 9,'asana_sub_type_id' => 6]);
        \DB::table('asana_level')->insert(['level_id' => 1,'asana_id' => 9]);

    	Asana::create([
    		'slug' => str_slug('Upward backbend Salute'),
    		'name' => 'Upward backbend Salute',
    		'sanskrit' => 'Hasta Uttanasana',
    		'etymology' => 'hasta (hand) + uttana (intense stretch) + asana (posture)',
    		'image_path' => 'app/demo/images/asana-10.jpg'
    	]);

        \DB::table('asana_asana_type')->insert(['asana_id' => 10,'asana_type_id' => 1]);
        \DB::table('asana_asana_sub_type')->insert(['asana_id' => 10,'asana_sub_type_id' => 3]);
        \DB::table('asana_level')->insert(['level_id' => 2,'asana_id' => 10]);

    	Asana::create([
    		'slug' => str_slug('Upward-facing-Dog Posture'),
    		'name' => 'Upward-facing-Dog Posture',
    		'sanskrit' => 'Urdhva-Mukha-Shvanasana',
    		'etymology' => 'urdhva (upward) + mukha (face) + śvān (dog) + āsana (posture)',
    		'image_path' => 'app/demo/images/asana-11.jpg'
    	]);

        \DB::table('asana_asana_type')->insert(['asana_id' => 11,'asana_type_id' => 4]);
        \DB::table('asana_asana_sub_type')->insert(['asana_id' => 11,'asana_sub_type_id' => 3]);
        \DB::table('asana_level')->insert(['level_id' => 2,'asana_id' => 11]);

    	Asana::create([
    		'slug' => str_slug('Four-Limbed-Stick-Posture'),
    		'name' => 'Four-Limbed-Stick-Posture',
    		'sanskrit' => 'Chaturanga Dandasana',
    		'etymology' => 'chatur (four) + anga (limb) + danda (staff,) + asana (pose)',
    		'image_path' => 'app/demo/images/asana-12.jpg'
    	]);

        \DB::table('asana_asana_type')->insert(['asana_id' => 12,'asana_type_id' => 5]);
        \DB::table('asana_asana_sub_type')->insert(['asana_id' => 12,'asana_sub_type_id' => 5]);
        \DB::table('asana_level')->insert(['level_id' => 2,'asana_id' => 12]);
    }
}
