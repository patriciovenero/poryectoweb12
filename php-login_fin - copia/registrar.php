<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtNombres"]) || empty($_POST["txtApellidos"]) || empty($_POST["txtDNI"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtFecha_Ingreso"]) || empty($_POST["txtFecha_Recojo"]) || empty($_POST["txtResultados"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$Nombres = $_POST["txtNombres"];
$Apellidos = $_POST["txtApellidos"];
$DNI = $_POST["txtDNI"];
$Telefono = $_POST["txtTelefono"];
$Fecha_Ingreso = $_POST["txtFecha_Ingreso"];
$Fecha_Recojo = $_POST["txtFecha_Recojo"];
$Resultados = $_POST["txtResultados"];

$sentencia = $bd->prepare("INSERT INTO datausuario(Nombres,Apellidos,DNI,Telefono,Fecha_Ingreso,Fecha_Recojo,Resultados) VALUES (?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$Nombres, $Apellidos, $DNI, $Telefono, $Fecha_Ingreso,$Fecha_Recojo,$Resultados]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
