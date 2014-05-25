<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 21.04.14
 * Time: 20:36
 */

class Advice implements JsonSerializable{

    private $adviceId;
    private $advice;
    private $imageNamePart;


    /**
     * @return mixed
     */
    public function getAdvice()
    {
        return $this->advice;
    }

    /**
     * @return mixed
     */
    public function getAdviceId()
    {
        return $this->adviceId;
    }

    /**
     * @return mixed
     */
    public function getImageNamePart()
    {
        return $this->imageNamePart;
    }


    public function jsonSerialize(){
        return array(
            'adviceId' => $this->adviceId,
            'advice' => $this->advice,
            'imageNamePart' => $this->imageNamePart
        );
    }
} 