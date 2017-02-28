<?php
require 'simplexml.class.php';
$productos = simplexml_load_file('C:\Apache24\htdocs\CRUD\productos.xml');

if(isset($_POST['btn_guardar']))
{
	foreach ($productos->producto as $producto)
	{
		if ($producto['id'] == $_POST['id'])
		{
			$producto->nombre = $_POST['nombre'];
			$producto->precio = $_POST['precio'];
			break;
		}
	}
	
	file_put_contents('C:/Apache24/htdocs/CRUD/productos.xml', $productos->asXML());
	header('location: index.php');
}

foreach ($productos->producto as $producto)
{
	if($producto['id']==$_GET['id'])
	{
		$id = $producto['id'];
		$nombre = $producto->nombre;
		$precio = $producto->precio;
		break;
	}
}
?>

<form method = "post">
	<table cellpaddin="2" cellspacing="2">
		<tr>
			<td>Id</td>
			<td><input type="text" name="id" value="<?php echo $id ?>" readonly="readonly" > </td>
		</tr>
		<tr>
			<td>Nombre</td>
			<td><input type="text" name="nombre" value="<?php echo $nombre ?>" > </td>
		</tr>
		<tr>
			<td>Precio</td>
			<td><input type="text" name="precio" value="<?php echo $precio ?>" > </td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="btn_guardar" value="Guardar"> </td>
		</tr>
	</table>
</form>