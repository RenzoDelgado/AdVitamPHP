<?php 

$conexion = mysqli_connect('localhost','root','','bd_advitam');

$vlAseguradora = $_POST['cboAseguradora'];
$vlNombre = $_POST['txtNombre'];
$vlApellido = $_POST['txtApellido'];
$vlCelular = $_POST['txtCelular'];
$vlCorreo = $_POST['txtCorreo'];
$vlTipoDocumento = $_POST['cboDocumento'];
$vlDocumento = $_POST['txtDocumento'];
$vlFechaNacimiento = $_POST['txtFecha'];
$vlPago = $_POST['cboPago'];
$idDoctor = $_POST['cboDoctor'];;
$vlFecha = $_POST['fecha'];
$vlHora= $_POST['hora'];
$vlEstado = 1;

$sql = "INSERT INTO tb_cita(idAseguradora,nombrePaciente,apellidoPaciente,telefono,correo,fechaNac,idTipoDoc,nroDocumento,idMetodoPago,idDoctor,fecha,hora,estado) values(".$vlAseguradora.",'".$vlNombre."','".$vlApellido."','".$vlCelular."','".$vlCorreo."','".$vlFechaNacimiento."',".$vlTipoDocumento.",'".$vlDocumento."','".$vlPago."',".$idDoctor.",'".$vlFecha."','".$vlHora."',".$vlEstado.")";

if (empty($vlAseguradora) && empty($vlNombre) && empty($vlApellido) && empty($vlCelular) && empty($vlCorreo) && empty($vlTipoDocumento) && empty($vlDocumento) && empty($vlFechaNacimiento) && empty($vlPago)) {
    
}else{
    $result=mysqli_query($conexion,$sql);
    echo json_encode($sql);
}



mysqli_close($conexion);



?>

