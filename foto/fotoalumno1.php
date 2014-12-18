<?php
ob_start();
include("../seguridad2.php");
include("../conexion.php");
session_start();$ncontrol=$_SESSION['ncontrol'];
$archivo = $_FILES["file"]["tmp_name"]; 
echo $tamanio = $_FILES["file"]["size"];
$tipo    = $_FILES["file"]["type"];
$nombre  = $_FILES["file"]["name"];
 
if (!strpos($tipo,"gif") & !strpos($tipo,"jpg") & !strpos($tipo,"jpeg") & !strpos($tipo,"png")) { 
	$error="El Formato $tipo es Incompatible..........";header("location:fotoalumno.php?error=$error");exit();
}

if($tamanio>500000){//500kb
	$error="El Tamaño del Archivo es muy Grande: $tamanio ..........";header("location:fotoalumno.php?error=$error");exit();
}
if ($archivo!="none"){
   $fp = fopen($archivo, "rb");
   $contenido = fread($fp, $tamanio);
   $contenido = addslashes($contenido);
   fclose($fp); 
	$sql="update alumnos set FOTO='$contenido',NOMBREF='$nombre',TIPO='$tipo' where N_CONTROL='$ncontrol'";
	$rs=mysql_query($sql,$conexion);
	if(!$rs){
		$error="Error al cargar la Foto..........".mysql_error();header("location:fotoalumno.php?error=$error");exit();
	}
}else{
		$error="Seleccione un archivo valido..........";header("location:fotoalumno.php?error=$error");exit();
}
session_start();
if (($_SESSION["autentificado2"] == "SI")) {
		header("Location:../principal.php");
		exit();
}else{
	header("location:../consultaalumnos.php");exit();
}
ob_end_flush();
?>
