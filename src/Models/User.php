<?php

namespace Dsw\Blog\Models;

use DateTime;

class User{
    public function __construct(
        private int $id,
        private string $name,
        private string $email,
        private DateTime $register_date
    ){}

    public function __toString(){
        return $this->id . " - " . $this->name . " - " . $this->email . " - " . $this->register_date->format('d-m-Y H:i:s'); 
    }
}



?>