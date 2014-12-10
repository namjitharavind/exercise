<?php

class UnitException extends Exception {
    
}

abstract class Unit {

    abstract function addUnit(Unit $unit);

    abstract function removeUnit(Unit $unit);

    abstract function bombardStrength();
}

class Archer extends Unit {

    function addUnit(Unit $unit) {
        throw new UnitException(get_class($this) . " is a leaf");
    }

    function removeUnit(Unit $unit) {
        throw new UnitException(get_class($this) . " is a leaf");
    }

    function bombardStrength() {
        return 4;
    }

}

class LaserCannonUnit extends Unit {

    function addUnit(Unit $unit) {
        throw new UnitException(get_class($this) . " is a leaf");
    }

    function removeUnit(Unit $unit) {
        throw new UnitException(get_class($this) . " is a leaf");
    }

    function bombardStrength() {
        return 44;
    }

}

class Army extends Unit {

    private $units = array();

    function addUnit(Unit $unit) {
        if (in_array($unit, $this->units, true)) {
            return;
        }
        $this->units[] = $unit;
    }

    function removeUnit(Unit $unit) {
        $this->units = array_udiff($this->units, array($unit), function( $a, $b ) {
            return ($a === $b) ? 0 : 1;
        });
    }

    function bombardStrength() { 
        $ret = 0;
        foreach ($this->units as $unit) {
            $ret += $unit->bombardStrength();
        }
        return $ret;
    }

}

// create an army
$main_army = new Army();
// add some units
$main_army->addUnit( new Archer() );
$main_army->addUnit( new LaserCannonUnit() );


// create a new army
$sub_army = new Army();

// add some units
$sub_army->addUnit( new Archer() );
$sub_army->addUnit( new Archer() );
$sub_army->addUnit( new Archer() );

// add the second army to the first
$main_army->addUnit( $sub_army );

// all the calculations handled behind the scenes
print "attacking with strength: {$main_army->bombardStrength()}\n";

