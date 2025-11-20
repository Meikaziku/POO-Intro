<?php 

class Formule1 {
    private float $speed = 5;

    public function drive(): string 
    {
        return "Vroom vroom à $this->speed km/h";
    }

     public function shiftGear()
    {
        $this->speed += 1;
    }
}




