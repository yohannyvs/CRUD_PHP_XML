<?php
if(isset($_POST['btn_guardar']))
{
	require 'simplexml.class.php';
	$productos = simplexml_load_file('C:/Apache24/htdocs/CRUD/productos.xml');
	$producto = $productos->addChild('producto');
	$producto->addAttribute('id', $_POST['id']);
	$producto->addChild('nombre', $_POST['nombre']);
	$producto->addChild('precio', $_POST['precio']);
	file_put_contents('C:/Apache24/htdocs/CRUD/productos.xml', $productos->asXML());
	header('location: index.php');
}
?>

<form method = "post">
	<table cellpaddin="2" cellspacing="2">
		<tr>
			<td>Id</td>
			<td><input type="text" name="id" > </td>
		</tr>
		<tr>
			<td>Nombre</td>
			<td><input type="text" name="nombre" > </td>
		</tr>
		<tr>
			<td>Precio</td>
			<td><input type="text" name="precio" > </td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="btn_guardar" value="Guardar"> </td>
		</tr>
	</table>
</form>