<?php

class Employee
{
    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;

    public function __construct(string $name, float $salary, string $position, string $department, $email = 'n/a', $age = -1)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
}

$count = intval(trim(fgets(STDIN)));

$departmentSalaries = [];
$employees = [];
for ($i = 0; $i < $count; $i++) {
    $tokens = explode(' ', trim(fgets(STDIN)));
    $name = $tokens[0];
    $salary = floatval($tokens[1]);
    $position = $tokens[2];
    $department = $tokens[3];
    $age = -1;
    $email = 'n/a';

    if (isset($tokens[4])) {
        if (is_numeric($tokens[4])) {
            $age = intval($tokens[4]);
        } else {
            $email = $tokens[4];
        }
    }

    if (isset($tokens[5])) {
        if (is_numeric($tokens[5])) {
            $age = intval($tokens[5]);
        } else {
            $email = $tokens[5];
        }
    }

    $employees[] = new Employee($name, $salary, $position, $department, $email, $age);
}

foreach ($employees as $employee) {
    if (!array_key_exists($employee->getDepartment(), $departmentSalaries)) {
        $departmentSalaries[$employee->getDepartment()] = [];
    }

    $departmentSalaries[$employee->getDepartment()][] = $employee->getSalary();
}

$bestDepartment = null;
$maxAverageSalary = 0;
foreach ($departmentSalaries as $department => $salaries) {
    $averageSalary = array_sum($salaries) / count($salaries);
    if ($averageSalary > $maxAverageSalary) {
        $maxAverageSalary = $averageSalary;
        $bestDepartment = $department;
    }
}

$bestEmployees = [];
foreach ($employees as $employee) {
    if ($employee->getDepartment() == $bestDepartment) {
        $bestEmployees[] = $employee;
    }
}

usort($bestEmployees, function($a, $b){
    return $a->getSalary() < $b->getSalary();
});

echo "Highest Average Salary: {$bestDepartment}" . PHP_EOL;
foreach ($bestEmployees as $bestEmployee) {
    $salary = number_format($bestEmployee->getSalary(), 2);
    echo "{$bestEmployee->getName()} {$salary} {$bestEmployee->getEmail()} {$bestEmployee->getAge()}" . PHP_EOL;
}