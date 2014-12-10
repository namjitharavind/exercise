<?php

abstract class ParamHandler {

    protected $source;
    protected $params = array();

    function __construct($source) {
        $this->source = $source;
    }

    function addParam($key, $val) {
        $this->params[$key] = $val;
    }

    function getAllParams() {
        return $this->params;
    }

    static function getInstance($filename) {
        if (preg_match("/\.xml$/i", $filename)) {
            return new XmlParamHandler($filename);
        }
        return new TextParamHandler($filename);
    }

    abstract function write();

    abstract function read();
}

class XmlParamHandler extends ParamHandler {

    function write() {
// write XML
// using $this->params
    }

    function read() {
// read XML
// and populate $this->params
    }

}

class TextParamHandler extends ParamHandler {

    function write() {
// write text
// using $this->params
    }

    function read() {
// read text
// and populate $this->params
    }

}

$test = ParamHandler::getInstance( "./params.xml" );
$test->addParam("key1", "val1" );
$test->addParam("key2", "val2" );
$test->addParam("key3", "val3" );
$test->write(); // writing in XML format
