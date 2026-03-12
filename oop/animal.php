<!-- $sheep = new Animal("shaun");

echo $sheep->name; // "shaun"
echo $sheep->legs; // 4
echo $sheep->cold_blooded; // "no"

// NB: Boleh juga menggunakan method get (get_name(), get_legs(), get_cold_blooded()) -->


<?php

class Animal {

    public $get_name;
    public $get_legs = 4;
    public $get_cold_blooded = "no";

    public function __construct($name){
        $this->get_name = $name;
    }

}

?>