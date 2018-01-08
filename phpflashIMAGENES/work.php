<?php
global $dbuser,$dbpass;
$dbuser="root";
$dbpass="";
switch($_GET['HttpOpc']){
	case "Fila":
		if (isset($_GET['FilaActual'])) {
		    $FilaActual = $_GET['FilaActual'];
		}else{
			$FilaActual = 0;
		}
		$res=Fila($FilaActual,$_GET['total']);
		break;
		
	case "Borrar":
		$res=Borrar($_GET['id']);
		break;
}
// devuelvo el resultado dependiente de cada funcion
//return de result depending of each function
echo $res;
exit();

//Borra una imagen $User del disco, y retorna si se borro algo o no
//erase an image from de disc and return if sucess or not

function Borrar($ID){
	$link=mysql_connect("localhost",$dbuser,$dbpass);
	mysql_select_db("test");
	$sql="Select path from pics where id=". $ID;
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$path=$row[0];
	if (file($path)){//pregunto si existe porque si no es asi la siguiente linea daria error
		unlink($path);
	}
	$Delete="DELETE FROM pics Where id=$ID";
	$rs = mysql_query($Delete);
	$r="res=" . mysql_affected_rows() . "&basura=nada";//se añade basura para eliminar el espacio despues de res=0 o res=1 para que lo use flash
	return $r;
}

//devuelve un registro especico y el total si es la primera carga del script, para las proximas cargas no se saca, porque consume recursos, y ya se saba cual es su valor
//return one espefic reg and the total if is it the first run of the script, for the nexts loads it don't take it, because now i know the value

function Fila($FilaActual,$SacarTotal){
	$link=mysql_connect("localhost",$dbuser,$dbpass);
	mysql_select_db("test");
	$query_rs = "SELECT * FROM pics";
	if ($SacarTotal=="si"){
		$rs = mysql_query($query_rs) or die(mysql_error());
		$totalRows = mysql_num_rows($rs);
	}else{
		$totalRows=$SacarTotal;
	}
	if ($FilaActual>$totalRows-1){//para que no pase del limite de registros de la tabla
		$FilaActual--;
	}
	$query_limit_rs = sprintf("%s LIMIT %d, %d", $query_rs, $FilaActual, 1);
	$rs = mysql_query($query_limit_rs) or die(mysql_error());
	$row = mysql_fetch_assoc($rs);
	$httpres="&total=". $totalRows. "&actual=". $FilaActual. "&id=". $row["id"]. "&tipo=" .$row["tipo"]. "&tamano=" .$row["size"]. "&path=" .$row["path"] ;
	if ($totalRows==0){
		$httpres="&total=0&actual=0&path=No existen&id=&tipo=&tamano=";
	}	
	mysql_free_result($rs);
	return $httpres;
}
?>
