<?php

namespace Tests\Unit;

use App\Taco;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TacoUnitTest extends TestCase
{

    public function testIsAModel()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Model', new Taco(), 'Taco is a model');
    }

    public function testCanAddCheese()
    {
        $taco = new Taco();
        $cheese = 'Cheddar';
        $taco->addCheese($cheese);
        $this->assertEquals($cheese, $taco->cheese, 'Adding Cheddar Cheese');
    }

    public function testCanAddShell()
    {
        $taco = new Taco();
        $type = 'Soft Flour';
        $taco->addShell($type);
        $this->assertEquals($type, $taco->shell, 'Adding Soft Flour Shell');
    }

    public function testCanAddMeat()
    {
        $taco = new Taco();
        $meat = 'Soylent Green';
        $taco->addMeat($meat);
        $this->assertEquals($meat, $taco->meat, 'Adding Soylent Green');
    }

    public function testCanAddLettuce()
    {
        $taco = new Taco();
        $lettuce = 'Iceberg';
        $taco->addLettuce($lettuce);
        $this->assertEquals($lettuce, $taco->lettuce, 'Adding Iceberg Lettuce');
    }

    public function testCanAddSauce()
    {
        $taco = new Taco();
        $sauce = 'Hot';
        $taco->addSauce($sauce);
        $this->assertEquals($sauce, $taco->sauce, 'Adding Hot Sauce');
    }

    public function testCannotAddRottenMeat()
    {
        $taco = new Taco();
        $this->assertFalse($taco->addMeat('rotten'));
    }

    /**
     * @expectedException \Exception
     */
    public function testCannotAddMoldyCheese()
    {
        $taco = new Taco();
        $taco->addCheese('Moldy French Cheese');
    }
}
