<?php
interface IFood
{
    public function getHappinessPoints() : int;
}

class Cram implements IFood
{
    public function getHappinessPoints() : int
    {
        return 2;
    }
}

class Lembas implements IFood
{
    public function getHappinessPoints() : int
    {
        return 3;
    }
}

class Apple implements IFood
{
    public function getHappinessPoints() : int
    {
        return 1;
    }
}

class Melon implements IFood
{
    public function getHappinessPoints() : int
    {
        return 1;
    }
}

class HoneyCake implements IFood
{
    public function getHappinessPoints() : int
    {
        return 5;
    }
}

class Mushrooms implements IFood
{
    public function getHappinessPoints() : int
    {
        return -10;
    }
}

class NotAFood implements IFood
{
    public function getHappinessPoints() : int
    {
        return -1;
    }
}

class FoodFactory
{
    public function getFood(string $foodName) : IFood
    {
        if(class_exists($foodName)) {
            return new $foodName();
        }

        return new NotAFood();
    }
}

class MoodFactory
{
    public function getMood(int $happiness) : string
    {
        if ($happiness <= -5) {
            return 'Angry';
        }

        if ($happiness <= 0) {
            return 'Sad';
        }

        if ($happiness <= 15) {
            return 'Happy';
        }

        return 'PHP';
    }
}

$totalHappiness = 0;
$foods = preg_split('/[, ]+/', trim(fgets(STDIN)));
$foodFactory = new FoodFactory();
foreach ($foods as $food) {
    $totalHappiness += $foodFactory->getFood(trim($food))->getHappinessPoints();
}

$moodFactory = new MoodFactory();
echo $totalHappiness . PHP_EOL;
echo $moodFactory->getMood($totalHappiness);




