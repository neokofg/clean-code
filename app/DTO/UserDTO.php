<?php

namespace App\DTO;

class UserDTO {
    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct(string $id = null, string $name = null, string $email = null, string $password = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    public function fillForCreation(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function fillForUpdate(string $id, array $data)
    {
        $this->id = $id;
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
