<?php 

$conexion = mysqli_connect('localhost','root','','bd_advitam');
$viIdEspecialidad = $_POST['valorCombo'];
$tiempoAtencion = "";

$sql = "SELECT es.tiempoAtencion FROM tb_especialidad es WHERE es.id = $viIdEspecialidad";

$result = mysqli_query($conexion,$sql);

while($datos = mysqli_fetch_array($result)){
    $tiempoAtencion = $datos['tiempoAtencion'];
}

echo json_encode($tiempoAtencion);

?>