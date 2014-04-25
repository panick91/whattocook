<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 21.04.14
 * Time: 20:36
 */

class Ingredient implements JsonSerializable{

    private $ingredientId;
    private $label;
    private $nutritionalValue;
    private $imageNamePart;

    function getIngredientId(){
        return $this->ingredientId;
    }

    function getLabel(){
        return $this->label;
    }

    function getNutritionalValue(){
        return $this->nutritionalValue;
    }

    function getImagePartName(){
        return $this->imageNamePart;
    }

    public function jsonSerialize(){
        return array(
            'ingredientId' => $this->ingredientId,
            'label' => $this->label,
            'nutritionalValue' => $this->nutritionalValue,
            'imageNamePart' => $this->imageNamePart
        );
    }
} 