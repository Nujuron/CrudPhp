<?php
//getting id from url
$id = $_GET['id'];

require_once __DIR__."/../../config.php";

//including the controllers to get a record by id
include_once SITE_ROOT.'/controllers/customer_controller.php';

$customer = (new CustomerController())->getById($id);
?>

<?php

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$last_name = $_POST['last_name'];
	$status = $_POST['status'];	
	$email = $_POST['email'];	
    $phone = $_POST['phone'];

	// checking empty fields
	if(empty($name) || empty($last_name) || empty($email) || empty($phone)) {
				
		if(empty($name)) {
			echo "<font color='red'>El nombre está vacío.</font><br/>";
		}
		
		if(empty($last_name)) {
			echo "<font color='red'>El apellido está vacío.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>El email está vacío.</font><br/>";
		}

        if(empty($phone)) {
			echo "<font color='red'>El teléfono está vacío.</font><br/>";
		}	
	} else {	
		//updating the table
		$values = array();
		array_push($values, $id, $name, $last_name, $status, $email, $phone);
        $error = (new CustomerController())->updateById($values);
		//redirectig to the display page
		header("Location: ../../index.php");
	}
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../main.css">
	<title>Editar</title>
</head>

<body>
	<form name="form1" method="post" action="edit_customer.php">
				
        <label>Nombre<input type="text" name="name" value="<?php echo $customer->getName();?>"></label>
				
        <label>Apellido<input type="text" name="last_name" value="<?php echo $customer->getName();?>"></label>

        <legend>Status</legend>
		<label><input type="radio" name="status" value="0" <?php if($customer->getStatus() === 0) echo 'checked="checked" ' ?> > 0 </label>
        <label><input type="radio" name="status" value="1" <?php if($customer->getStatus() === 1) echo 'checked="checked" ' ?> > 1 </label>
        <br/>
        <label>Email<input type="text" name="email" value="<?php echo $customer->getEmail();?>"></label>
				
        <label>Teléfono<input type="text" name="phone" value="<?php echo $customer->getPhone();?>"></label>
			
		<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
		<input type="submit" name="update" value="Editar"></td>
		
	</form>
</body>
</html>