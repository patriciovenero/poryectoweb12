<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];
    $sentencia = $bd->prepare("select * from datausuario where codigo = ?;");
    $sentencia->execute([$codigo]);
    $datausuario = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                            <label class="form-label">Nombres: </label>
                            <input type="text" class="form-control" name="txtNombres"   required
                            value="<?php echo $datausuario->Nombres; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellidos: </label>
                            <input type="text" class="form-control" name="txtApellidos" autofocus required
                            value="<?php echo $datausuario->Apellidos; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">DNI: </label>
                            <input type="number" class="form-control" name="txtDNI" autofocus required
                            value="<?php echo $datausuario->DNI; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefono: </label>
                            <input type="number" class="form-control" name="txtTelefono" autofocus required
                            value="<?php echo $datausuario->Telefono; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha de ingreso: </label>
                            <input type="date" class="form-control" name="txtFecha_Ingreso" autofocus required
                            value="<?php echo $datausuario->Fecha_Ingreso; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha de recojo: </label>
                            <input type="date" class="form-control" name="txtFecha_Recojo" autofocus required
                            value="<?php echo $datausuario->Fecha_Recojo; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Resultados: </label>
                            <input type="file" class="form-control" name="txtResultados" autofocus required
                            value="<?php echo $datausuario->Resultados; ?>">
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="codigo" value="<?php echo $datausuario->codigo; ?>">
                            <input type="submit" class="btn btn-primary" value="Editar">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>