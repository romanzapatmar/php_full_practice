<?php

//access Modifier
class base{
    public $name;
    public function __construct($name){
        $this->name = $name;
    }
    public function show(){
        echo "Your Name is : " . $this->name . "<br>";
    }
}


//object
$test = new base("Joker");
$test->name = "Ye to assigned name hai";
$test->show();
// $a = new A();
// $a->name = "Roman";
// $a->show();

?>