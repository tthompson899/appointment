<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    use RefreshDatabase;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User
        factory(User::class, 50)->create();

        // Types
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
        }
     
        // Appointment
        factory(App\Appointment::class, 50)->create();
        // $this->call(UserAppointmentSeeder::class);

        // User appointment
        factory(UserAppointment::class, 50)->create();
    }
}
