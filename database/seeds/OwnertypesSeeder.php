<?php

use Illuminate\Database\Seeder;

class OwnertypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $owner_typeses = DB::table('owner_types')->get();
        $ownerIds = array();
        foreach($owner_typeses as $owner_types){
            array_push($ownerIds, $owner_types->id);
        }
        for($i=0; $i<25; $i++){
            DB::table('example')->insert([
                'name'         => $faker->sentence(4,true),
                'description'       => $faker->paragraph(3,true),
                'owner_types'     => $ownerIds[random_int(0,count($ownerIds) - 1)],
            ]);
        }
    }
}
