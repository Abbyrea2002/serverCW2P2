<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/items');

        $response->assertStatus(200);
    }

    public function test_homepage_contains_empty_table(): void
    {
        $response = $this->get('/items');

        $response->assertStatus(200);
        $response->assertSee(__('There are no items.'));
    }

    public function test_paginated_items_table_does_contain_1st_record()
    {
        $items = Item::factory(1)->create([
            'name' => 'Toy',
            'content'  => 'Car',
            'amount' => 2,
        ]);

        $response = $this->get('/items');

        $response->assertStatus(200);
        $response->assertSee(__('Car'));

    }

    public function test_paginated_items_table_contains_toy_record()
    {
        $items = Item::factory(1)->create([
            'name' => 'Toy',
            'content' => 'Car',
            'amount' => 2,
        ]);

        $response = $this->get('/items');
        $response->assertStatus(200);
        $response->assertSee('Toy');
    }

    public function test_paginated_items_table_doesnt_contain_pen_record()
    {
        $items = Item::factory(1)->create([
            'name' => 'Toy',
            'content' => 'Car',
            'amount' => 2,
        ]);

        $response = $this->get('/items');

        $response->assertStatus(200);
        $response->assertDontSee('Pen');
    }

    public function test_paginated_items_table_contain_photos_record()
    {
        $items = $this->seed();

        $response = $this->get('/items');

        $response->assertStatus(200);
        $response->assertSeeHtml('Photos');
    }

    public function test_paginated_items_table_contain_hats_record()
    {
        $items = $this->seed();

        $response = $this->get('/items?page=5');

        $response->assertStatus(200);
        $response->assertSee('Hats');
    }

    public function test_paginated_items_table_doesnt_contain_cats_record()
    {
        $items = $this->seed();

        $response = $this->get('/items?page=5');

        $response->assertStatus(200);
        $response->assertDontSee('Cats');
    }
    public function test_there_are_3_users_in_the_db()
    {
        $items = $this->seed();

        $this->assertDatabaseCount('users', 3);
    }

    public function test_there_is_a_user_with_the_email_pete()
    {
        $items = $this->seed();

        $this->assertDatabaseHas('users', [
            'email' => 'pete@abc.com',
        ]);
    }
}

