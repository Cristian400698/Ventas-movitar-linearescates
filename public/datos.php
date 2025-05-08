<?php 
$conexion=mysqli_connect('localhost','root','','movistar');
$continente=$_POST['continente'];

	$sql="SELECT id_ciudad,
			 id_continente,
			 Municipio 
		from ciudad
		where id_continente='$continente'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>SELECT 2 (paises)</label> 
			<select id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";
	

?>




<?php 
$conexion=mysqli_connect('localhost','root','','movistar');
$continente=$_POST['continente'];

	$sql="SELECT id_estadorevisado,
			 id_revision,
			 estado 
		from estadorevisado
		where id_revision='$continente'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>SELECT 2 (estadorevisado)</label> 
			<select id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";
	

?>