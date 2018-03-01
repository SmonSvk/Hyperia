<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 28. 2. 2018
 * Time: 17:54
 */

class User
{

    private $name, $surName, $pass, $age, $city;
    function __construct($name, $surName, $pass, $age, $city)
    {
        $this->name = $name;
        $this->surName = $surName;
        $this->pass = $pass;
        $this->age = $age;
        $this->city = $city;
    }

    function getName()
    {
        return $this->name;
    }

    function getSurName()
    {
        return $this->surName;
    }

    function getPass()
    {
        return $this->pass;
    }

    function getAge()
    {
        return $this->age;
    }

    function getCity()
    {
        return $this->city;
    }
}