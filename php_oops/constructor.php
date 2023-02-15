<?php

class person {
    //public $name, $age;
    //default value
    public $name;
    public $age;

    //constructor function
    function __construct($username = "No Name", $roll = 23){
        //this $name have only local variable scope
        $this->name = $username;
        $this->age = $roll;

    }

    //method
    function show(){
        echo $this->name . " - " . $this->age . "<br>";
    }
}

//object
$p1 = new person();
$p2 = new person("Rinku", 30);
$p3 = new person("Riya", 40);

//initializing Values
// $p1->name = "Roman";
//$p1->age = 23;

//function call
$p1->show();
$p2->show();
$p3->show();




?>