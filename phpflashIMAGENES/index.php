<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Imagenes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>

<body bgcolor="#112A4A" text="#FFFFFF">
<table width="100%" border="0">
  <tr>
    <td><div align="center"> 
        <form action="" method="post" enctype="multipart/form-data" name="form" id="form">
          <input name="archivo" type=file id="archivo">
          <input name="submit" type=submit value=Upload>
          <input type="reset" name="Reset" value="Borrar">
        </form>
        <?php        
$extensiones=array("jpg","jpeg");
$dbuser="root"; //usuario de la base de datos
$dbpass="root2512"; // password para la base
if (isset($_FILES['archivo']['name'])){ // si estoy subiendo el archivo o es la primera carga de la pagina
	$path="imagenes/"; // path adonde la voy a guardar, en este caso mi_ubicacion_actual/imagenes
	$nombre=$_FILES['archivo']['name'];
	$tamanio=$_FILES['archivo']['size'];
	$tipo=$_FILES['archivo']['type'];
	$var = explode(".","$nombre");
	$num = count($extensiones);
	$valor = $num-1;
	$admitido=false;
	for($i=0; $i<=$valor; $i++) {
	    if($extensiones[$i] == $var[1]) {        
			$admitido=true;//es una extension valida
			break;
	    }
	}
	if ($admitido){
  	    $link=mysql_connect("localhost",$dbuser,$dbpass);
        mysql_select_db("test");
		$tamanio=round($tamanio/1024,0); //redondeo y paso a kb
		$sql="Insert Into pics (tipo,size,path) values ('" .$tipo. "'," .$tamanio. ",'" .$path. "')";  				
		mysql_query($sql);
        $lastid=mysql_insert_id();
		$path.=$lastid . "-" . $nombre; 
		$sql="Update pics set path='" . $path . "' Where id=$lastid"; 
		mysql_query($sql);		
		if (is_uploaded_file($_FILES['archivo']['tmp_name']))
		 {
			  copy($_FILES['archivo']['tmp_name'], "$path");?>
        <font color="#CCCCCC" size="2" face="Verdana, Arial, Helvetica, sans-serif">El 
        archivo se ha subido correctamente al servidor.</font> 
        <?php
		if (mysql_affected_rows($link)==0){?>
        <font color="#CCCCCC" size="2" face="Verdana, Arial, Helvetica, sans-serif">Ocurrio un error guardando 
        en la base de datos. </font> 
        <?php
		 }
		 }
		else 
			{ ?>
        <font color="#CCCCCC" size="2" face="Verdana, Arial, Helvetica, sans-serif">Error 
        al subir el archivo.</font> 
        <?php
		}

	
	}else{?>
        <font color="#CCCCCC" size="2" face="Verdana, Arial, Helvetica, sans-serif">Tipo 
        de archivo no admitido, debe ser .jpg &oacute; .jpeg</font> 
        <?php
	}
}	
	
?>
      </div></td>
  </tr>
  <tr>
    <td><div align="center">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="453" height="295">
          <param name="movie" value="forma.swf">
          <param name=quality value=high>
          <embed src="forma.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="453" height="295"></embed> 
        </object>
      </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp; </p>
</body>
</html>
