<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT Nombres, Apellidos,Telefono, Fecha_Recojo, Resultados 
  FROM datausuario 
  WHERE codigo = ?;");
$sentencia->execute([$codigo]);
$datausuario = $sentencia->fetch(PDO::FETCH_OBJ);

    $url = 'https://whapi.io/api/send';
    $data = [
        "app" => [
            "id" => '51982425442',
            "time" => '1654728819',
            "data" => [
                "recipient" => [
                    "id" => '51'.$datausuario->Telefono
                ],
                "message" => [[
                    "time" => '1654728819',
                    "type" => 'text',
                    "value" => 'Estimado(a) *'.strtoupper($datausuario->Nombres).' '.strtoupper($datausuario->Apellidos).'Le informamos que ya salieron sus resultados el cual es el siguiente: '.strtoupper($datausuario->Resultados)
                ]]
            ]
        ]
    ];
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    header('Location: index.php?codigo='.$datausuario->$codigo);
?>
