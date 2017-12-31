<?php
class Book
{
    protected $title;
    protected $author;
    protected $price;

    public function __construct($title, $author, float $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        if (strlen($title) < 3) {
            throw new Exception('Title not valid!');
        }

        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        if (is_numeric(explode(' ', $author)[1][0])) {
            throw new Exception('Author not valid!');
        }

        $this->author = $author;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        if ($price <= 0) {
            throw new Exception('Price not valid!');
        }

        $this->price = $price;
    }
}

class GoldenEditionBook extends Book
{

    public function __construct($title, $author, float $price)
    {
        parent::__construct($title, $author, $price * 1.3);
    }
}

try {
    $author = trim(fgets(STDIN));
    $title = trim(fgets(STDIN));
    $price = trim(floatval(fgets(STDIN)));
    $type = trim(fgets(STDIN));

    if ($type == 'STANDARD') {
        $book = new Book($title, $author, $price);
    } else if ($type == 'GOLD') {
        $book = new GoldenEditionBook($title, $author, $price);
    } else {
        throw new Exception('Type is not valid!');
    }

    echo 'OK' . PHP_EOL;
    echo $book->getPrice();
} catch (Exception $exception) {
    echo $exception->getMessage();
}