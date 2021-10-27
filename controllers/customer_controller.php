<?php

require_once __DIR__."/../config.php";

include_once SITE_ROOT.'/includes/db.php';
include_once SITE_ROOT.'/models/Customer.php';

class CustomerController extends DB {

    public function getAllCustomers($userid) {
        $query = $this->connect()->prepare(
            'SELECT c.id, c.name, c.last_name, c.status, c.email, c.phone 
            FROM customer c 
            INNER JOIN records r USING (id) 
            WHERE r.user_id=:user');
        $query->execute(['user'=> $userid]);

        $customers = array();
        if ($query->rowCount()) {
            
            foreach ($query as $customer) {
                $newCustomer = new Customer($customer);
                $customers[] = $newCustomer;
            }
        }

        return $customers;
    }
    
    public function getById($id) {
        $query = $this->connect()->prepare(
            'SELECT * FROM customer WHERE id=:id');
        $query->execute(['id'=> $id]);

        if ($query->rowCount()) {
            foreach ($query as $customer) {
                $newCustomer = new Customer($customer);
            }
            
            return $newCustomer;
        }
        
        return "error";
        
    }

    public function updateById($values) {
        $query = $this->connect()->prepare(
            'UPDATE customer SET name=:name , last_name=:last_name, status=:status, email=:email, phone=:phone WHERE id=:id');
        $query->execute(['id'=> $values[0], 'name'=> $values[1], 'last_name'=> $values[2], 'status'=> $values[3], 'email'=> $values[4], 'phone'=> $values[5]]);

        if ($query->rowCount()) {
            foreach ($query as $customer) {
                $newCustomer = new Customer($customer);
            }
            
            return "success";
        }
        
        return "error";
    }

    public function deleteById($id) {
        $query = $this->connect()->prepare(
            'DELETE FROM customer WHERE id=:id');
        $query->execute(['id'=> $id]);
        
    }
}

?>