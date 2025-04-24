<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::factory()->count(10)->create();
        $items = [
            [
                'id'=> 11,
                'title'=> "Dart Board",
                'description'=> "Cork Board",
                'quantity'=> 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
            ];
        $chunks = array_chunk($items, 50);
    
            foreach ($chunks as $chunk) {
                Item::insert($chunk);
            }
            $this->command->info('Seeded the Items!');
        }
    }
    