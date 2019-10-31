<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de países</title>
</head>
<body>
<?php
function conectar_mysql(){
    $server='localhost';
    $user='root';
    $password='';
    $db='paises';
    $conectar=mysqli_connect($server,$user,$password,$db);
    if(!$conectar){
        die("Error al conectar con la bd");
    }
    return $conectar;
}

function get_list(){
$retval='';
$retval='
<table align="center" border=1>
		<tr bgcolor=#E3CEF6>
			<td colspan=7 align="center"><b>SISTEMA DE PAISES</b></td>
		</tr>
		<tr bgcolor=#D8CEF6>
			<td colspan=7><a href=""><img src="images/new.png"></a></td>
		</tr>
		<tr bgcolor=#FAAC58>
			<td align="center"><b>Codigo pais:</b></td>
			<td align="center"><b>Nombre:</b></td>
        </tr>';
        $conectar=conectar_mysql();
        $sql='SELECT * FROM paises;';
        $res=mysqli_query($conectar,$sql);
        while($pais = mysqli_fetch_array($res)){
           $retval.=' 
		<tr bgcolor=#CEE3F6>
			<td>'.$pais['cod_pais'].'</td>
			<td align="center">'.$pais['nombre'].'</td>
            <td><a href="index.php?op=edi&id='.$pais['id'].'">
            <img src="images/edit.png"></a></td>
            <td><a href="index.php?op=bor&id='.$pais['id'].'">
            <img src="images/borrar.png"></a></td>
        </tr>';
        }
        $retval.='</table>';
        return $retval;
}

echo get_list();
?>
</body>
</html>