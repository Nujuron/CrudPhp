<?php

include_once 'includes/db.php';
include_once 'models/Business.php';

class BusinessController extends DB {

    public function getAllBusinesses($userid) {
        $query = $this->connect()->prepare(
            'SELECT b.id, b.business_name, b.vat_number, b.status, b.email, b.phone 
            FROM business b 
            INNER JOIN records r USING (id) 
            WHERE r.user_id=:user');
        $query->execute(['user'=> $userid]);
        
        $businesses = array();
        if ($query->rowCount()) {
            
            foreach ($query as $business) {
                $newBusiness = new Business($business);
                $businesses[] = $newBusiness;
            }
        }

        return $businesses;
    }
    
}

?>