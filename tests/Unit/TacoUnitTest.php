<?php

namespace Tests\Unit;

use App\Taco;
use Tests\TestCase;

class TacoUnitTest extends TestCase
{

    /**
     * Test that the taco class extends the model class
     */
    public function testIsAModel()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Model', new Taco(), 'Taco is a model');
    }

    /**
     * Test that we can add cheese
     */
    public function testCanAddCheese()
    {
        $taco = new Taco();
        $cheese = 'Cheddar';
        $taco->addCheese($cheese);
        $this->assertEquals($cheese, $taco->cheese, 'Adding Cheddar Cheese');
    }

    /**
     * Test that we can add a shell
     */
    public function testCanAddShell()
    {
        $taco = new Taco();
        $type = 'Soft Flour';
        $taco->addShell($type);
        $this->assertEquals($type, $taco->shell, 'Adding Soft Flour Shell');
    }

    /**
     * Test that we can add no shell
     */
    public function testCanNoShell()
    {
        $taco = new Taco();
        $type = '';
        $taco->addShell($type);
        $this->assertEquals($type, $taco->shell, 'Adding No Shell');
    }

    /**
     * Test that we can add meat
     */
    public function testCanAddMeat()
    {
        $taco = new Taco();
        $meat = 'Beef';
        $taco->addMeat($meat);
        $this->assertEquals($meat, $taco->meat, 'Adding Soylent Green');
    }

    /**
     * Test that we can add lettuce
     */
    public function testCanAddLettuce()
    {
        $taco = new Taco();
        $lettuce = 'Iceberg';
        $taco->addLettuce($lettuce);
        $this->assertEquals($lettuce, $taco->lettuce, 'Adding Iceberg Lettuce');
    }

    /**
     * Test that sauce can be added
     */
    public function testCanAddSauce()
    {
        $taco = new Taco();
        $sauce = 'Hot';
        $taco->addSauce($sauce);
        $this->assertEquals($sauce, $taco->sauce, 'Adding Hot Sauce');
    }

    /**
     * Makes sure that rotten meat cannot be added
     */
    public function testCannotAddRottenMeat()
    {
        $taco = new Taco();
        $this->assertFalse($taco->addMeat('rotten'));
    }

    /**
     * Makes sure that moldy cheese cannot be added
     *
     * @expectedException \Exception
     */
    public function testCannotAddMoldyCheese()
    {
        $taco = new Taco();
        $taco->addCheese('Moldy French Cheese');
    }
}
