<?php

class Business {
    private $id;
    private $name;
    private $vat_number;
    private $status;
    private $email;
    private $phone;

    public function __construct($business) {
        $this->id = $business['id'];
        $this->name = $business['name'];
        $this->vat_number = $business['vat_number'];
        $this->status = $business['status'];
        $this->email = $business['email'];
        $this->phone = $business['phone'];
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getVat() {
        return $this->vat_number;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }
}

?>