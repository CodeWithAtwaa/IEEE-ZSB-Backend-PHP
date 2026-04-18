<?php
// create class
class AppleDevice
{
    // properties
    public $name;
    private $ram;
    protected $space;

    //Methods
    public function getName() {
        return $this->name;
    }
}

class Sony extends AppleDevice {
    public $camera;
    public function getCamera() {
        return $this->camera;
    }

}

// create object
$iphone = new AppleDevice();
echo $iphone->name = "Iphone 14";
echo "<br>";
echo $iphone->getName();

$sony = new Sony();
echo "<br>";
echo $sony->name = "Sony";
echo "<br>";
echo $sony->getCamera();
