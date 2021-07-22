<?php 
header('Content-Type: application/json; charset=utf-8');

$conexion = mysqli_connect('localhost','root','','bd_advitam');
$viIdDoctor = $_POST['idDoctor'];
$viFecha = $_POST['fecha'];
$arrayDatos = array();

$sql = "SELECT ct.id, ct.hora FROM tb_cita ct WHERE ct.idDoctor = $viIdDoctor AND ct.fecha = '$viFecha' AND ct.estado=1 ";

$result = mysqli_query($conexion,$sql);

while($datos = mysqli_fetch_array($result)){
    $arrayDatos[] = array('id' => $datos['id'], 'hora' => $datos['hora']);
}

echo json_encode($arrayDatos);

?>