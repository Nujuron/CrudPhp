<?php
//including the controllers to get all the records
include_once("controllers/business_controller.php");
include_once("controllers/customer_controller.php");

$businesses = (new BusinessController())->getAllBusinesses($user->getUserId());
$customers = (new CustomerController())->getAllCustomers($user->getUserId());
?>
<h2>Empresas:</h2>
<table width='80%' border=0>
	<tr bgcolor='#CCCCCC'>
			<td>Nombre</td>
			<td>VAT</td>
			<td>Status</td>
			<td>Email</td>
			<td>Phone</td>
	</tr>
	<?php
	foreach ($businesses as $business) {		
			echo "<tr>";
			echo "<td>".$business->getName()."</td>";
			echo "<td>".$business->getVat()."</td>";
			echo "<td>".$business->getStatus()."</td>";
            echo "<td>".$business->getEmail()."</td>";
			echo "<td>".$business->getPhone()."</td>";
			echo "<td><a href=\"edit.php?id=".$business->getId()."\">Edit</a> | <a href=\"delete.php?id=".$business->getId()."\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
</table>
<h2>Clientes:</h2>
<table width='80%' border=0>
	<tr bgcolor='#CCCCCC'>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Status</td>
			<td>Email</td>
			<td>Phone</td>
	</tr>
	<?php
	foreach ($customers as $customer) {		
			echo "<tr>";
			echo "<td>".$customer->getName()."</td>";
			echo "<td>".$customer->getLastName()."</td>";
			echo "<td>".$customer->getStatus()."</td>";
            echo "<td>".$customer->getEmail()."</td>";
			echo "<td>".$customer->getPhone()."</td>";
			echo "<td><a href=\"edit.php?id=".$customer->getId()."\">Edit</a> | <a href=\"delete.php?id=".$customer->getId()."\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
</table>
