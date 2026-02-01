<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('categories')->insert([
            [
                'name' => 'Vetements',
                'slug' => 'vetements',
                'description' => 'Pieces du quotidien et essentiels.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Accessoires',
                'slug' => 'accessoires',
                'description' => 'Sacs, casquettes et petits plus.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Maison',
                'slug' => 'maison',
                'description' => 'Objets utiles pour la maison.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Papeterie',
                'slug' => 'papeterie',
                'description' => 'Carnets et accessoires papier.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Cadeaux',
                'slug' => 'cadeaux',
                'description' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
