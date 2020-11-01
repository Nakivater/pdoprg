<?php

class Student
{
    private $id;
    private $name;
    private $age;
    private $money;

    public function setId($id)
    {
        $this->id=$id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setName($name)
    {
$this->name=$name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setAge($age)
    {
$this->age=$age;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function setMoney($money)
    {
$this->money=$money;
    }
    public function getMoney()
    {
        return $this->money;
    }
    public function Show()
    {
        return "id:{$this->id} name:{$this->name} age:{$this->age} money: {$this->money}";
    }
}