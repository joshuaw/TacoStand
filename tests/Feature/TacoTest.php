<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Taco;

/**
 * Class TacoTest
 *
 * @package Tests\Feature
 */
class TacoTest extends TestCase
{
    //use RefreshDatabase;
    use DatabaseTransactions;

    /**
     * Test that all ingredients can be added to a taco (simple integration test)
     */
    public function testCanAddAllIngredients()
    {
        $taco = new Taco();

        $taco_ingredients = self::getRandomizedIngredients();

        $taco->addIngredients($taco_ingredients);

        foreach ($taco_ingredients as $name => $taco_ingredient) {

            $this->assertEquals($taco_ingredient, $taco->{$name}, 'Adding multiple ingredients to a taco');
        }


    }

    /**
     * Test that the model is working, and that we can save a sample taco.
     */
    public function testCanBeSaved()
    {
        $taco = new Taco();

        $taco->addIngredients(self::getRandomizedIngredients());

        $this->assertTrue($taco->save(), 'Saving the taco to the database');


    }

    /**
     * Test that the controller can accept and store a taco via POST
     */
    public function testUserCanAddATaco()
    {
        $taco_ingredients = self::getRandomizedIngredients();

        $response = $this->call('POST', '/', $taco_ingredients);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('tacos', $taco_ingredients);
    }

    public function testUserCanDeleteATaco()
    {
        $taco = new Taco();
        $taco->addIngredients(self::getRandomizedIngredients());
        $taco->saveOrFail();

        $response = $this->call('GET', '/'.$taco->id.'/delete');

        $this->assertDatabaseMissing('tacos', ['id' => $taco->id]);

    }


    /**
     * Convenience function to get some taco ingredients
     *
     * @return array
     */
    private function getRandomizedIngredients()
    {
        $meats    = ['Beef', 'Chicken', 'Soylent Green'];
        $shells   = ['Soft Flour', 'Crunchy'];
        $cheeses  = ['Cheddar', 'Queso Fresco'];
        $lettuces = ['Iceberg', 'Red'];
        $sauces   = ['Hot', 'Mild', 'Medium', 'Ghost Pepper'];

        return [
            'shell'   => $shells[array_rand($shells)],
            'meat'    => $meats[array_rand($meats)],
            'lettuce' => $lettuces[array_rand($lettuces)],
            'cheese'  => $cheeses[array_rand($cheeses)],
            'sauce'   => $sauces[array_rand($sauces)],
        ];
    }

}
