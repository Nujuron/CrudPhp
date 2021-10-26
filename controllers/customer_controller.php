<?php

include_once 'db.php';

class CustomerController extends DB {

    public function getAllBusiness($userid) {
        $query = $this->connect()->prepare(
            'SELECT c.name, c.last_name, c.status, c.email, c.phone 
            FROM customer c 
            INNER JOIN records r USING (id) 
            WHERE r.user_id=:user');
        $query->execute(['user'=> $userid]);

        if ($query->rowCount()) {
            return $query;
        } else {
            return ;
        }
    }
    
}


?>