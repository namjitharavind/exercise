<?php
error_reporting(E_ALL);
class Person {

    private $_name;
    private $_age;

    function __set($property, $value) {
       
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
    }
    
    function __get( $property ) {
         echo "dfdf";  exit;
    }

    function setName($name) {
        $this->_name = $name;
        if (!is_null($name)) {
            $this->_name = strtoupper($this->_name);
        }
    }

    function setAge($age) {
        $this->_age = strtoupper($age);
    }
    

}
$p = new Person();
//$p->name = "bob";
echo $p->name;
