<?php
    define("PI" ,"3.1415");
    // create class
class AppleDevice {
    // properties
    const CHIP = "A10 Fusion";

    //Methods
    public function getChip() {
        return self::CHIP;
    }
}
    // create object
$iphone = new AppleDevice();
echo $iphone->getChip();
echo "<br>";
echo AppleDevice::CHIP;