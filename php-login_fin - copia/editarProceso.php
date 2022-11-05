<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include_once 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $Nombres = $_POST["txtNombres"];
    $Apellidos = $_POST["txtApellidos"];
    $DNI = $_POST["txtDNI"];
    $Telefono = $_POST["txtTelefono"];
    $Fecha_Ingreso = $_POST["txtFecha_Ingreso"];
    $Fecha_Recojo = $_POST["txtFecha_Recojo"];
    $Resultados = $_POST["txtResultados"];

    $sentencia = $bd->prepare("UPDATE datausuario SET Nombres = ?, Apellidos = ?, DNI = ?,Telefono = ?,Fecha_Ingreso = ?, Fecha_Recojo = ?, Resultados = ? where codigo = ?;");
    $resultado = $sentencia->execute([$Nombres, $Apellidos, $DNI, $Telefono, $Fecha_Ingreso,$Fecha_Recojo,$Resultados,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
