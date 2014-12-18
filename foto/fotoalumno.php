<?php 
			include("../seguridad2.php");
			include('../conexion.php');
			$ncontrol=$_REQUEST['ncontrol'];
			$error=$_REQUEST['error'];
			@session_start();$_SESSION['ncontrol']=$ncontrol;
			$sql="SELECT * FROM alumnos WHERE N_CONTROL='$ncontrol'";
			$rs=mysql_query($sql,$conexion);
			$row=mysql_fetch_array($rs);
			$ncontrol=$row["N_CONTROL"];
			$nombre=$ncontrol.' '.$row["NOMBRE_ALUMNO"].' '.$row["A_PATERNO"].' '.$row["A_MATERNO"];
?>
<html>
<head>
<title>Cargar Archivos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="file:///D|/R_NOE1/PROYECTO TITULO/cinformacion/admin/css/default.css" type=text/css rel=stylesheet>
<script language="javascript" src="key2.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
<!--
function hayerror(form1){
	if(form1){
		if(form1.error.value!=""){
			alert(form1.error.value+".......!");
		}
		form1.file.focus();
	}
}
function exit(){
	var msg=confirm("¿Esta seguro que desea abandonar el formulario?");
	if(msg){
		location.href("../principal.php");
	}
}
function valida(){
	if(form1.file.value==""){
		alert("Seleccione el Archivo Imagen.....!");
		form1.file.focus();
		return false;
	}
}
//-->
</script>
<link href="../css/estilos.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="hayerror(this.form1);">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" class="TD1" align="center">CARGAR FOTOGRAFIA DEL ALUMNO </td>
  </tr>
  <tr>
    <td height="247">
	
	<form action="fotoalumno1.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return valida();">
	  <table width="496" height="188" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="496" height="162">
		  <fieldset>
		  <p>
		    <legend class="TD1">CARGAR FOTOGRAFIA DEL ALUMNO</legend>
		    </p>
		  <table width="466" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" class="normaltext"><?php echo $nombre; ?></td>
              </tr>
            <tr>
              <td width="91" align="right">Archivo:</td>
              <td width="357"><input name="file" type="file" class="texto2" size="50" maxlength="80">
                  <input name="error" type="hidden" id="error" value="<?php echo $error ?>">
                  <input name="ncontrol" type="hidden" id="ncontrol" value="<?php echo $ncontrol ?>"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input name="enviar" type="submit" class="texto7" id="enviar" value="Subir Foto">
                  <input name="salir" type="button" class="texto7" id="salir" value="    Salir    " onClick="exit();">              </td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><div align="justify">Haga clic sobre el boton <span class="error">Examinar</span> para seleccionar la imagen (Fotografia), los formatos v&aacute;lidos son: gif, jpg, tif. La dimensi&oacute;n y el tama&ntilde;o del archivo de fotografia no debe ser mayor a 500kb. Esta im&aacute;gen es la que va a aparecer en la informaci&oacute;n de Perfil de Usuario. Una vez seleccionada la imagen, haga clic sobre el bot&oacute;n <span class="error">Subir Foto</span>, para cancelar la operacion, haga clic sobre el bot&oacute;n <span class="error">Salir</span>.</div> </td>
            </tr>
          </table>
		  </fieldset>
		  </td>
        </tr>
      </table>
	</form>
	
	</td>
  </tr>
</table>
</body>
</html>
