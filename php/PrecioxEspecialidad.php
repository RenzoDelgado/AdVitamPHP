<?php
header('Content-Type: application/json; charset=utf-8');

$conexion = mysqli_connect('localhost','root','','bd_advitam');
$viIdEspecialidad = $_POST['valorCombo'];
$arrayDatos = array();

$sql = "SELECT p.precio FROM tb_precioconsulta p inner join tb_especialidad e on e.id=p.idEspecialidad where p.idEspecialidad=$viIdEspecialidad";

$result = mysqli_query($conexion,$sql);

while($datos = mysqli_fetch_array($result)){
    $arrayDatos[] = array('precio' => $datos['precio']);
}

echo json_encode($arrayDatos);

?>