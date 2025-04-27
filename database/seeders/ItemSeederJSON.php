<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class ItemSeederJSON extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::truncate();

        $json = File::get("database/data/items.json");

        $item = json_decode($json);

        foreach ($item as $key => $value) {
            Item::create([
                "id" => $value->id,
                "title" => $value->title,
                "description" => $value->description,
                "quantity" => $value->quantity,
                "created_at" => $value->created_at,
                "updated_at" => $value->updated_at,]);
        }
    }
}

