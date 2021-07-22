<?php 
header('Content-Type: application/json; charset=utf-8');

$conexion = mysqli_connect('localhost','root','','bd_advitam');
$viIdDoctor = $_POST['idDoctor'];
$arrayDatos = array();

$sql = "SELECT ho.id, ho.fecha, ho.horaInicio, ho.horaFinal FROM tb_horario ho WHERE ho.idDoctor = $viIdDoctor AND ho.estado=1  AND ho.fecha >= NOW() ORDER BY ho.fecha ASC";

$result = mysqli_query($conexion,$sql);

while($datos = mysqli_fetch_array($result)){
    $arrayDatos[] = array('id' => $datos['id'], 'fecha' => utf8_encode($datos['fecha']), 'horaInicio' => utf8_encode($datos['horaInicio']), 'horaFinal' => utf8_encode($datos['horaFinal']));
}

echo json_encode($arrayDatos);

?>