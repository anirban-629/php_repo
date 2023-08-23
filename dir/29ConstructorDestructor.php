<?php
class Employee
{
    public $name;
    public $salary = 100;

    function __construct($name)
    {
        echo 'Constructor Runnig<br>';
        $this->name = $name;
    }

    function __destruct()
    {
        echo 'Destructing - ' . $this->name;
    }
}

$e1 = new Employee("Anirban");
$e1 = new Employee("Suchorita");

// echo $e1->name . '=' . $e1->salary;
