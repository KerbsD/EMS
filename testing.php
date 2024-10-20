<?php
class Employee{
    private $name;
    private $salary;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getEmp(){
        return $this->name = $name;
    }

    public function getSal(){
        return $this->salary = $salary;
    }
}

$e = new Employee("Kirby", "Php100,000");

echo $e->getSal();
?>