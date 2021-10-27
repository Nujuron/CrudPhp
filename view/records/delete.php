<?php
//getting id from url
$id = $_GET['id'];
$type = $_GET['type'];
require_once __DIR__."/../../config.php";

//including the controllers to get a record by id
include_once SITE_ROOT.'/controllers/business_controller.php';
include_once SITE_ROOT.'/controllers/customer_controller.php';

if ($type == 'business') {
    (new BusinessController())->deleteById($id);
} else {
    (new CustomerController())->deleteById($id);
}


header("Location: ../../index.php");
?>
