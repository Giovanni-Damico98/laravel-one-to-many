<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('projects')->truncate();
        $faker = Faker::create();
        $typeIds = Type::all()->pluck('id');
        for ($i = 0; $i < 30; $i++) {
            DB::table('projects')->insert([
                'name' => $faker->unique()->sentence(3),
                'type_id' => $faker->randomElement($typeIds),
                'date' => $faker->date(),
                'description' => $faker->paragraphs(2, true),
                'languages' => $faker->optional()->words(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}