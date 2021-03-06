<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 29.04.14
 * Time: 17:26
 */

class Receipt implements JsonSerializable{

    private $receiptId;
    private $name;
    private $instructions;
    private $difficulty;
    private $duration;
    private $imagePartName;
    private $score;

    /**
     * @param mixed $difficulty
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @param mixed $imagePartName
     */
    public function setImagePartName($imagePartName)
    {
        $this->imagePartName = $imagePartName;
    }

    /**
     * @param mixed $instructions
     */
    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getReceiptId()
    {
        return $this->receiptId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * @return mixed
     */
    public function getDurration()
    {
        return $this->duration;
    }

    /**
     * @return mixed
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @return mixed
     */
    public function getDifficultyName()
    {
        switch($this->difficulty){
            case 1: return 'easy';
            case 2: return 'medium';
            case 3: return 'difficult';
            default: return '';
        }
    }

    /**
     * @return string
     */
    public function getImagePartName()
    {
        return $this->imagePartName;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return array(
            'receiptId' => $this->receiptId,
            'name' => $this->name,
            'instructions' => $this->instructions,
            'difficulty' => $this->difficulty,
            'duration' => $this->duration,
            'imagePartName' => $this->imagePartName,
            'score' => $this->score
        );
    }
}