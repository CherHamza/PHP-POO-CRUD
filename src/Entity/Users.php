<?php

namespace Digi\Keha\Entity;
use Digi\Keha\Kernel\Model;

class Users extends Model {
    
    private int $id;
    private string $name;
    private string $surname;

    public function getId()
    {
        return $this->id;
    }
    public function  setId(int $id)
    {
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function  setName(int $name)
    {
        $this->name = $name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function  setSurname(int $surname)
    {
        $this->surname = $surname;
    }
 
}
