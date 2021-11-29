<?php

namespace App\Classes;

class Color
{
  protected int $red;
  protected int $green;
  protected int $blue;



    /**
     * @return int
     */
    public function getRed(): int
    {
        return $this->red;
    }

    /**
     * @param int $red
     * @return Color
     */
    public function setRed(int $red): Color
    {
        $this->red = $red;
        return $this;
    }

    /**
     * @return int
     */
    public function getGreen(): int
    {
        return $this->green;
    }

    /**
     * @param int $green
     * @return Color
     */
    public function setGreen(int $green): Color
    {
        $this->green = $green;
        return $this;
    }

    /**
     * @return int
     */
    public function getBlue(): int
    {
        return $this->blue;
    }

    /**
     * @param int $blue
     * @return Color
     */
    public function setBlue(int $blue): Color
    {
        $this->blue = $blue;
        return $this;
    }

/* Determine a RGB colour value (round and keep between 0 and 255).
*
* @access protected
* @param integer $value The value to fix.
*/
    protected static function setColorValue($value){

        // returned fixed value
        return max(min(round((int)$value), 255), 0);

    }

    public static function convertRGBToHex($red, $green, $blue){

        // convert rgb color to hexadecimal value
        $red = str_pad(dechex(self::setColorValue($red)), 2, '0', STR_PAD_LEFT);
        $green = str_pad(dechex(self::setColorValue($green)), 2, '0', STR_PAD_LEFT);
        $blue = str_pad(dechex(self::setColorValue($blue)), 2, '0', STR_PAD_LEFT);

        // concat and return full color
        return '#'.$red . $green . $blue;

    }

    public static function saveColorToArray(...$color){
        $res = [];
        array_push($res,...$color);
        return $res;
    }
    public static function getAllColors(){
        return self::saveColorToArray();
    }

    public function changeColorValues($red=0, $green=0, $blue=0){

        // add values
        $this->red = self::setColorValue($this->red + (int)$red);
        $this->green = self::setColorValue($this->green + (int)$green);
        $this->blue = self::setColorValue($this->blue + (int)$blue);

    }

    //randomize color
    public function randomiseColor(){

        // randomise values
        $this->red = rand(0, 255);
        $this->green = rand(0, 255);
        $this->blue = rand(0, 255);

    }

    public function getRGBColor(){

        // return the array
        return array(
            'red' => $this->red,
            'green' => $this->green,
            'blue' => $this->blue
        );

    }
    public function getHexColor($hash=false): string
    {
        return ($hash ? '#' : '') . self::convertRGBToHex($this->red, $this->green, $this->blue);
    }

    /**
     * toString magic method.
     *
     * @return string Returns the HEX code that represents the colour.
     */
    public function __toString(): string
    {
        return $this->getHexColor(true);
    }
}