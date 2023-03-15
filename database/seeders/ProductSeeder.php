<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        //Cria 3 produtos com informações aleatórias
        for ($i=0; $i <= 3; $i++) { 
            Product::insert([
                'name' => $faker->words(1, true), //Gera uma palavra aleatória
                'description' => $faker->sentence(3), //Gera um parágrafo aleatório
                'price' => $faker->randomFloat(2, 1, 500), //Gera um valor double aleatório
                'barcode' => $faker->isbn10(), //Gera um código aleatório
                'created_at' => date("Y-m-d H:i:s"), //Data e hora atual
                'updated_at' => date("Y-m-d H:i:s") //Data e hora atual
            ]);
        }
    }
}
