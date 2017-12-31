<?php
class Box
{
    private $length;
    private $width;
    private $height;

    public function __construct(float $length, float $width, float $height)
    {
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setLength($length);
    }

    /**
     * @param float $length
     */
    public function setLength(float $length)
    {
        if ($length <= 0) {
            throw new Exception('Length cannot be zero or negative.');
        }

        $this->length = $length;
    }

    /**
     * @param float $width
     */
    public function setWidth(float $width)
    {
        if ($width <= 0) {
            throw new Exception('Width cannot be zero or negative.');
        }

        $this->width = $width;
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height)
    {
        if ($height <= 0) {
            throw new Exception('Height cannot be zero or negative.');
        }

        $this->height = $height;
    }

    public function getSurfaceArea()
    {
        return
            number_format($this->height * $this->width * 2
            + $this->height * $this->length * 2
            + $this->length * $this->width * 2, 2, '.', '');
    }

    public function getLateralSurfaceArea()
    {
        return
            number_format($this->height * $this->length * 2
            + $this->height * $this->width * 2, 2, '.', '');
    }

    public function getVolume()
    {
        return number_format($this->height * $this->width * $this->length, 2, '.', '');
    }
}

$length = floatval(fgets(STDIN));
$width = floatval(fgets(STDIN));
$height = floatval(fgets(STDIN));

try {
    $box = new Box($length, $width, $height);

    echo 'Surface Area - ' . $box->getSurfaceArea() . PHP_EOL;
    echo 'Lateral Surface Area - ' . $box->getLateralSurfaceArea() . PHP_EOL;
    echo 'Volume - ' . $box->getVolume() . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage();
}