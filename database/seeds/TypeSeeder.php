<?php

use App\Type;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

class TypeSeeder extends Seeder
{
    use RefreshDatabase;

        /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
           'annual cleaning',
            'bonding',
            'bridges',
            'crowns',
            'dentures',
            'fillings',
            'hygiene',
            'implants',
            'inlays',
            'invisalign_vid',
            'orthodontics',
            'partial dentures',
            'perodontal',
            'TMJ',
            'root canal',
            'veneers',
            'whitening'
        ];

        foreach ($types as $type) {
            \DB::table('types')->insert([
                'name' => $type,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        };
    }
}
