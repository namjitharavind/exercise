<?php

abstract class CostStrategy {

    abstract function cost(Lesson $lesson);

    abstract function chargeType();
}

abstract class Lesson {

    private $duration;
    private $costStrategy;

    function __construct($duration, CostStrategy $strategy) {
        $this->duration = $duration;
        $this->costStrategy = $strategy;
    }

    function cost() {
        return $this->costStrategy->cost($this);
    }

    function chargeType() {
        return $this->costStrategy->chargeType();
    }

    function getDuration() {
        return $this->duration;
    }

    //more lesson methods
}

class Lecture extends Lesson {
    //Lecture specific implimatation
}

class Seminar extends Lesson {
    //Seminar specific implimatation
}

class TimedCostStrategy extends CostStrategy {

    function cost(Lesson $lesson) {
        return ($lesson->getDuration() * 5);
    }

    function chargeType() {
        return "hourly rate";
    }

}

class FixedCostStrategy extends CostStrategy {

    function cost(Lesson $lesson) {
        return 30;
    }

    function chargeType() {
        return "fixed rate";
    }

}

$lessons[] = new Seminar(4, new TimedCostStrategy());
$lessons[] = new Lecture(4, new FixedCostStrategy());
foreach ($lessons as $lesson) {
    print "lesson charge {$lesson->cost()}. ";
    print "Charge type: {$lesson->chargeType()}<br>";
}
