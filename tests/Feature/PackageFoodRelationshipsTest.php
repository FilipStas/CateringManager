<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Food;
use App\Models\Package;

class PackageFoodRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    public function test_package_food_pivot_relationship_and_quantity()
    {
        // create foods and package
        $f1 = Food::create(['name' => 'Apple']);
        $f2 = Food::create(['name' => 'Banana']);

        $p = Package::create([
            'name' => 'Breakfast',
            'description' => 'Morning package',
            'price' => 9.99,
        ]);

        // attach with quantities
        $p->foods()->attach($f1->id, ['quantity' => 3]);
        $p->foods()->attach($f2->id, ['quantity' => 2]);

        // database assertions
        $this->assertDatabaseHas('foods', ['id' => $f1->id, 'name' => 'Apple']);
        $this->assertDatabaseHas('packages', ['id' => $p->id, 'name' => 'Breakfast']);
        $this->assertDatabaseHas('food_package', [
            'food_id' => $f1->id,
            'package_id' => $p->id,
            'quantity' => 3,
        ]);

        // Eloquent relation and pivot value
        $p->refresh();
        $this->assertCount(2, $p->foods);
        $this->assertEquals(3, $p->foods()->where('foods.id', $f1->id)->first()->pivot->quantity);

        // update pivot and assert change
        $p->foods()->updateExistingPivot($f1->id, ['quantity' => 5]);
        $this->assertDatabaseHas('food_package', [
            'food_id' => $f1->id,
            'package_id' => $p->id,
            'quantity' => 5,
        ]);
    }
}

