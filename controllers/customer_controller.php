<?php

include_once 'includes/db.php';
include_once 'models/Customer.php';

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
    
}

?>