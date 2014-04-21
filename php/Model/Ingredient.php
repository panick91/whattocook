<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 21.04.14
 * Time: 20:36
 */

namespace whattocook;


class Ingredient {

    private $name;
    private $source;

    function __construct($name, $source){
        $this->name = $name;
        $this->source = $source;
    }

    function getName(){
        return $this->name;
    }

    function getSource(){
        return $this->source;
    }
} 