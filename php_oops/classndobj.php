<?php

// classes and objects
class calculation{

  public $a, $b, $c;
   function sum(){
     $this->c = $this->a + $this->b;
     return $this->c;
   }
   function sub(){
    $this->c = $this->a - $this->b;
    return $this->c;
  }
}
  $c1 = new calculation();
  $c1->a = 50;
  $c1->b = 20;

  $c2 = new calculation();
  $c2->a = 700;
  $c2->b = 200;

  // echo $c1->sum();
  // echo $c2->sub();

  // echo "sum value of C1 : ". $c1->sum()   . "<br>";
  // echo "substract value of c2 :  ". $c2->sub() . "<br>" ;
   echo "substract value of c1 :  ". $c1->sub() ;


?>