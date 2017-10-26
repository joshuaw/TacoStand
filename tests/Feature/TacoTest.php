<?php

namespace Tests\Feature;

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
    public function testCanAddAllIngredients()
    {
        $taco = new Taco();

        $taco_ingredients = [
            'shell' => 'Soft Flour',
            'meat' => 'Soylent Green',
            'lettuce' => 'Iceberg',
            'cheese' => 'Queso Blanco',
            'sauce' => 'Ghost Pepper'
        ];

        $taco->addIngredients($taco_ingredients);

    }

}
