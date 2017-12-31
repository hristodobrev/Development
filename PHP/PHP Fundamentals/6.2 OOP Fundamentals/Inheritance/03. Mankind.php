<?php
class Human
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        if (strtoupper($firstName[0]) != $firstName[0]) {
            throw new Exception('Expected upper case letter!Argument: firstName');
        }

        if (strlen($firstName) < 4) {
            throw new Exception('Expected length at least 4 symbols!Argument: firstName');
        }

        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        if (strtoupper($lastName[0]) != $lastName[0]) {
            throw new Exception('Expected upper case letter!Argument: lastName');
        }

        if (strlen($lastName) < 4) {
            throw new Exception('Expected length at least 3 symbols!Argument: lastName');
        }

        $this->lastName = $lastName;
    }

    public function __toString()
    {
        return 'First Name: ' . $this->getFirstName() . PHP_EOL
            . 'Last Name: ' . $this->getLastName() . PHP_EOL;
    }
}

class Student extends Human
{
    private $facultyNumber;

    public function __construct($firstName, $lastName, $facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    public function getFacultyNumber()
    {
        return $this->facultyNumber;
    }

    public function setFacultyNumber($facultyNumber)
    {
        if (!preg_match('/^[0-9]{5,10}$/', $facultyNumber)) {
            throw new Exception('Invalid faculty number!');
        }

        $this->facultyNumber = $facultyNumber;
    }

    public function __toString()
    {
        return parent::__toString()
            . 'Faculty number: ' . $this->getFacultyNumber() . PHP_EOL;
    }
}

class Worker extends Human
{
    private $weekSalary;
    private $workHoursPerDay;

    public function __construct($firstName, $lastName, float $weekSalary, float $workHoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWorkHoursPerDay($workHoursPerDay);
    }

    public function getWeekSalary()
    {
        $this->weekSalary;
    }

    public function setWeekSalary($weekSalary)
    {
        if ($weekSalary < 10) {
            throw new Exception('Expected value mismatch!Argument: weekSalary');
        }

        $this->weekSalary = $weekSalary;
    }

    public function getWorkHoursPerDay()
    {
        return $this->workHoursPerDay;
    }

    public function setWorkHoursPerDay($workHoursPerDay)
    {
        if ($workHoursPerDay < 1 || $workHoursPerDay > 12) {
            throw new Exception('Expected value mismatch!Argument: workHoursPerDay');
        }

        $this->workHoursPerDay = $workHoursPerDay;
    }

    public function getSalary()
    {
        return number_format($this->getWeekSalary() / ($this->getWorkHoursPerDay() * 7), 2, '.', '');
    }

    public function __toString()
    {
        return parent::__toString()
            . 'Week Salary: ' . number_format($this->getWeekSalary(), 2, '.', '') . PHP_EOL
            . 'Hours per day: ' . number_format($this->getWorkHoursPerDay(), 2, '.', '') . PHP_EOL
            . 'Salary per hour: ' . $this->getSalary() . PHP_EOL;
    }
}

//Ivan Ivanov 08
//Pesho Kirov 1590 10

try {
    $studentParams = explode(' ', trim(fgets(STDIN)));
    $workerParams = explode(' ', trim(fgets(STDIN)));
    $student = new Student($studentParams[0], $studentParams[1], $studentParams[2]);
    $worker = new Worker($workerParams[0], $workerParams[1], floatval($workerParams[2]), floatval($workerParams[3]));

    echo $student;
    echo $worker;
} catch (Exception $exception) {
    echo $exception->getMessage();
}