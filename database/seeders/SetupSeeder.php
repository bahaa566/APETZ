<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedAnimals();
        $this->seedTypes();
//        $this->seedSplashes();
//        $this->seedAdvertisements();
//        $this->seedVehicleTypes();
//        $this->seedVehicleModels();
//        $this->seedVehiclepayloads();
    }

    protected function seedAnimals()
    {
        \DB::table('animals')->delete();

        \DB::table('animals')->insert(array(
            0 =>
            array(
                'active' => 1,
                'created_at' => '2022-03-27 11:17:52',
                'id' => 1,
                'name' => '{"ar":"\\u0645\\u0635\\u0631","en":"cat"}',
                'updated_at' => '2022-03-27 11:17:52',
            ),
            1 =>
            array(
                'active' => 1,
                'created_at' => '2022-03-27 11:18:09',
                'id' => 2,
                'name' => '{"ar":"\\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u064a\\u0629","en":"dog"}',
                'updated_at' => '2022-03-27 11:18:09',
            ),
        ));
    }

    protected function seedTypes()
    {
        \DB::table('types')->delete();

        \DB::table('types')->insert(array(
            0 =>
            array(
                'active' => 1,
                'animal_id' => 1,
                'created_at' => '2022-03-27 11:18:39',
                'id' => 1,
                'name' => '{"ar":"\\u0627\\u0644\\u0645\\u0646\\u0635\\u0648\\u0631\\u0629","en":"hehe"}',
                'updated_at' => '2022-03-27 11:18:39',
            ),
            1 =>
            array(
                'active' => 0,
                'animal_id' => 2,
                'created_at' => '2022-03-27 11:18:53',
                'id' => 2,
                'name' => '{"ar":"\\u062c\\u062f\\u0629","en":"hoho"}',
                'updated_at' => '2022-03-27 11:19:04',
            ),
        ));
    }

//    protected function seedSplashes()
//    {
//
//        \DB::table('splashes')->delete();
//
//        \DB::table('splashes')->insert([
//            [
//                'created_at' => '2022-03-27 11:24:09',
//                'description' => '{"en":"Mrs. Lorena Dibbert Jr."}',
//                'id' => 1,
//                'image' => 'splashes/HCicOYzZEp1j0ZrVVWZj43lbz5eXehoBo6dFxvUw.jpg',
//                'updated_at' => '2022-03-27 11:24:09',
//            ],
//            [
//                'created_at' => '2022-03-27 11:24:09',
//                'description' => '{"en":"Angus Schaefer"}',
//                'id' => 2,
//                'image' => 'splashes/Yn2kymePF7gRRZemoQUgQrsJzV6sLpALz6N4Q1P1.jpg',
//                'updated_at' => '2022-03-27 11:24:09',
//            ],
//        ]);
//    }

}
