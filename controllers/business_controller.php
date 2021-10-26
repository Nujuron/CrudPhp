<?php

include_once 'db.php';

class BusinessController extends DB {

    public function getAllBusiness($userid) {
        $query = $this->connect()->prepare(
            'SELECT b.business_name, b.vat_number, b.status, b.email, b.phone 
            FROM business b 
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