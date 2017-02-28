<?php
require 'simplexml.class.php';

if (isset($_GET['action']))
{
	$productos = simplexml_load_file('C:/Apache24/htdocs/CRUD/productos.xml');
	$id = $_GET['id'];
	$index = 0;
	$i = 0;
	
	foreach ($productos->producto as $producto)
	{
		if($producto['id'] == $id)
		{
			$index = $i;
			break;
		}
		
		$i++;
	}
	
	unset($productos->producto[$index]);
	file_put_contents('C:/Apache24/htdocs/CRUD/productos.xml', $productos->asXML());
	header("Location: index.php");
}?>
<a href="index.php" ></a>
<?php
$productos = simplexml_load_file('C:/Apache24/htdocs/CRUD/productos.xml');
echo 'Numero de Productos: '.count($productos);
echo '<br>Informacion de Lista de Productos';
?>

<br> <a href="insert.php"> Agregar nuevo producto</a> <br>

<table cellpaddin="2" cellspacing="2" border="1">
	<tr>
		<th>Id</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Opcion</th>
	</tr>
	<?php foreach ($productos->producto as $producto) {?>
		<tr>
			<td> <?php echo $producto['id']; ?> </td>
			<td> <?php echo $producto->nombre; ?> </td>
			<td> <?php echo $producto->precio; ?> </td>
			<td align="center"> 
			<a href="edit.php?id=<?php echo $producto['id']; ?>">Editar</a> |
			<a href="index.php?action=delete&id=<?php echo $producto['id']; ?>" onclick="return confirm('Estas seguro?')" >Borrar </a></td>
		</tr>
	<?php }?>
</table>