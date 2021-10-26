<?php

class Customer {
    private $id;
    private $name;
    private $last_name;
    private $status;
    private $email;
    private $phone;

    public function __construct($customer) {
        $this->id = $customer['id'];
        $this->name = $customer['name'];
        $this->last_name = $customer['last_name'];
        $this->status = $customer['status'];
        $this->email = $customer['email'];
        $this->phone = $customer['phone'];
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastName() {
        return $this->last_name;
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