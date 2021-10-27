<?php
//getting id from url
$id = $_GET['id'];

require_once __DIR__."/../../config.php";

//including the controllers to get a record by id
include_once SITE_ROOT.'/controllers/business_controller.php';

$business = (new BusinessController())->getById($id);
?>

<?php

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$vat = $_POST['vat'];
	$status = $_POST['status'];	
	$email = $_POST['email'];	
    $phone = $_POST['phone'];

	// checking empty fields
	if(empty($name) || empty($vat) || empty($email) || empty($phone)) {
				
		if(empty($name)) {
			echo "<font color='red'>El nombre está vacío.</font><br/>";
		}
		
		if(empty($vat)) {
			echo "<font color='red'>El VAT está vacío.</font><br/>";
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
		array_push($values, $id, $name, $vat, $status, $email, $phone);
        $error = (new BusinessController())->updateById($values);
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
	<form name="form1" method="post" action="edit_business.php">
		<table border="0">
			<tr> 
				<td>Nombre de la empresa</td>
				<td><input type="text" name="name" value="<?php echo $business->getName();?>"></td>
			</tr>
			<tr> 
				<td>VAT</td>
				<td><input type="text" name="vat" value="<?php echo $business->getVat();?>"></td>
			</tr>
			<tr> 
				<td>Status</td>
				<td><input type="radio" name="status" value="0" <?php if($business->getStatus() === 0) echo 'checked="checked" ' ?> >0</td>
                <td><input type="radio" name="status" value="1" <?php if($business->getStatus() === 1) echo 'checked="checked" ' ?>>1</td>
			</tr>
            <tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $business->getEmail();?>"></td>
			</tr>
            <tr> 
				<td>Teléfono</td>
				<td><input type="text" name="phone" value="<?php echo $business->getPhone();?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Editar"></td>
			</tr>
		</table>
	</form>
</body>
</html>