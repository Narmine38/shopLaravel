<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $categories = DB::table('categories')
            ->whereIn('slug', ['vetements', 'accessoires', 'maison', 'papeterie', 'cadeaux'])
            ->pluck('id', 'slug');

        DB::table('products')->insert([
            [
                'category_id' => $categories['vetements'] ?? null,
                'name' => 'T-shirt coton',
                'slug' => 't-shirt-coton',
                'description' => 'T-shirt confortable pour le quotidien.',
                'image' => null,
                'price' => 19.90,
                'stock' => 25,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => $categories['accessoires'] ?? null,
                'name' => 'Casquette urbaine',
                'slug' => 'casquette-urbaine',
                'description' => 'Casquette ajustable style street.',
                'image' => null,
                'price' => 14.50,
                'stock' => 40,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => $categories['maison'] ?? null,
                'name' => 'Mug ceramique',
                'slug' => 'mug-ceramique',
                'description' => 'Mug robuste pour cafe ou the.',
                'image' => null,
                'price' => 9.90,
                'stock' => 60,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => $categories['papeterie'] ?? null,
                'name' => 'Carnet kraft',
                'slug' => 'carnet-kraft',
                'description' => 'Carnet 120 pages pour notes et croquis.',
                'image' => null,
                'price' => 6.80,
                'stock' => 0,
                'is_active' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => $categories['cadeaux'] ?? null,
                'name' => 'Coffret cadeau',
                'slug' => 'coffret-cadeau',
                'description' => 'Selection de produits pour offrir.',
                'image' => null,
                'price' => 39.00,
                'stock' => 12,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
