<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taco extends Model
{
    protected $fillable = [
        'shell',
        'meat',
        'lettuce',
        'cheese',
        'sauce',
    ];

    public function addShell($shell)
    {
        $this->shell = $shell;
        return true;
    }

    public function addCheese($type)
    {
        if (stristr($type, 'moldy')) {
            throw new \Exception('That cheese has seen better days...');
        }

        $this->cheese = $type;
        return true;
    }

    public function addMeat($type)
    {
        if (stristr($type, 'rotten')) {
            return false;
        } else {
            $this->meat = $type;

            return true;
        }
    }

    public function addLettuce($type)
    {
        $this->lettuce = $type;
        return true;
    }

    public function addSauce($type)
    {
        $this->sauce = $type;
        return true;
    }

    public function addIngredients(array $ingredients)
    {
        $results = [];

        if (!empty($ingredients['shell'])) {
            $results[] = $this->addShell($ingredients['shell']);
        }

        if (!empty($ingredients['meat'])) {
            $results[] = $this->addMeat($ingredients['meat']);
        }

        if (!empty($ingredients['lettuce'])) {
            $results[] = $this->addLettuce($ingredients['lettuce']);
        }

        if (!empty($ingredients['cheese'])) {
            $results[] = $this->addCheese($ingredients['cheese']);
        }

        if (!empty($ingredients['sauce'])) {
            $results[] = $this->addSauce($ingredients['sauce']);
        }

        if (in_array(false, $results)){
            return false;
        }

        return true;

    }
}
