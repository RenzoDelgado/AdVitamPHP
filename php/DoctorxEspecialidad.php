<?php
header('Content-Type: application/json; charset=utf-8');

$conexion = mysqli_connect('localhost','root','','bd_advitam');
$viIdEspecialidad = $_POST['valorCombo'];
$arrayDatos = array();

$sql = "SELECT doc.id, doc.nombreDoctor,doc.apellidoDoctor,doc.foto, doc.nroColegiatura,doc.universidadDoctor from tb_doctor doc inner join tb_especialidad esp on esp.id = doc.idEspecialidad where esp.id=$viIdEspecialidad";

$result = mysqli_query($conexion,$sql);

while($datos = mysqli_fetch_array($result)){
    $arrayDatos[] = array('id' => $datos['id'], 'nombre' => utf8_encode($datos['nombreDoctor']), 'apellido' => utf8_encode($datos['apellidoDoctor']),'fotodoc' => utf8_encode($datos['foto']),'colegiatura' => utf8_encode($datos['nroColegiatura']),'universidad' => utf8_encode($datos['universidadDoctor']));
}

echo json_encode($arrayDatos);

?>