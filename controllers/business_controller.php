<?php
require_once __DIR__."/../config.php";

include_once SITE_ROOT.'/includes/db.php';
include_once SITE_ROOT.'/models/Business.php';

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
    
    public function getById($id) {
        $query = $this->connect()->prepare(
            'SELECT * FROM business WHERE id=:id');
        $query->execute(['id'=> $id]);

        if ($query->rowCount()) {
            foreach ($query as $business) {
                $newBusiness = new Business($business);
            }
            
            return $newBusiness;
        }
        
        return "error";
        
    }

    public function updateById($values) {
        $query = $this->connect()->prepare(
            'UPDATE business SET business_name=:bname , vat_number=:vat, status=:status, email=:email, phone=:phone WHERE id=:id');
        $query->execute(['id'=> $values[0], 'bname'=> $values[1], 'vat'=> $values[2], 'status'=> $values[3], 'email'=> $values[4], 'phone'=> $values[5]]);

        if ($query->rowCount()) {
            foreach ($query as $business) {
                $newBusiness = new Business($business);
            }
            
            return "success";
        }
        
        return "error";
    }

    public function deleteById($id) {
        $query = $this->connect()->prepare(
            'DELETE FROM business WHERE id=:id');
        $query->execute(['id'=> $id]);
        
    }
}

?>