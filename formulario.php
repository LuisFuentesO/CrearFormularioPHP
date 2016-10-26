<?php

function Filtro($texto) {
  return htmlspecialchars(trim($texto), ENT_QUOTES);
}

$nombre = isset($_POST['nombre']) ? Filtro($_POST['nombre']) : '';
$RUT = isset($_POST['RUT']) ? Filtro($_POST['RUT']) : '';
$direccion = isset($_POST['direccion']) ? Filtro($_POST['direccion']) : '';
$comuna = isset($_POST['comuna']) ? Filtro($_POST['comuna']) : '';
$edad = isset($_POST['edad']) ? (int) $_POST['edad'] : 0;
$sexo = isset($_POST['sexo']) ? Filtro($_POST['sexo']) : '';
$vocal = isset($_POST['vocal']) ? (int) $_POST['vocal'] : 0;
$alcalde = isset($_POST['alcalde']) ? Filtro($_POST['alcalde']) : 0;
$concejal = isset($_POST['concejal']) ? Filtro($_POST['concejal']) : 0;
$error = '';

?> 


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Formulario</title>
</head>
<body>
<div class="container">
  <span style="padding-top: 10px;"></span>
<?php
// Mostrar contenido
if($enviado == 1 && $contenido == 1) {
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  exit;
} else if(empty($nombre)) {
  $error = 'Debe ingresar su Nombre.';
} else if(empty($RUT)) {
  $error = 'Debe ingresar su RUT.';
} else if(empty($direccion)) {
  $error = 'Debe ingresar su direccion';
} else if(empty($comuna)) {
  $error = 'Debe ingresar su comuna.';
} else if(empty($edad)) {
  $error = 'Debe ingresar su edad.';
} else if(empty($sexo)) {
  $error = 'Debe ingresar su sexo';
} else if(empty($alcalde)) {
  $error = 'Debe ingresar su alcalde.';
} else if(empty($concejal)) {
  $error = 'Debe ingresar su concejal.';
}
// Vista de error
if(!empty($error)) {
?>
<div class="alert alert-info">
  <i class="glyphicon glyphicon-info-sign"></i>
  <?php echo $error; ?>
</div>
<a href="./" class="btn btn-warning">
  <i class="glyphicon glyphicon-chevron-left"></i>
  Volver
</a>
 <h3>¡Formulario enviado satisfactoriamente!</h3>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Datos enviados</h3>
    </div>
    <div class="panel-body">
      <p>Nombre: <b><?php echo $nombre; ?></b>,</p>
      <p>RUT: <b><?php echo $RUT; ?></b></p>
      <p>
        Tu foto de perfil es: <br />
        <img src="./assets/<?php echo $nombre_foto; ?>" class="thumbnail">
      </p>
      <p>
        Tu descripción es: <br />
        <blockquote>
          <?php echo $descripcion; ?>
        </blockquote>
      </p>
      <p>
        Tu año de ingreso es: <b><?php echo $anio; ?></b>
      </p>
      <p>
        Tu sexo es: <b><?php 
        if ($sexo == 'm' ){
          echo 'Masculino';
        }elseif ($sexo == 'f'){
          echo 'Femenino';
        }else{
          echo 'No responde';
        } 
        ?></b>
      </p>
      <p>
        Tu <b><?php echo ($terminos == 1 ? 'sí' : 'no'); ?></b> aceptaste los términos y condiciones.</b>
      </p>
      <p>
        Tu <b><?php echo ($basura == 1 ? 'sí' : 'no'); ?></b> aceptaste recibir correos basura, eugh.</b>
      </p>
    </div>
    <div class="panel-footer">
      <div class="text-right">
        <a href="./" class="btn btn-primary">
          <i class="glyphicon glyphicon-chevron-left"></i>
          Volver
        </a>
      </div>
    </div>
  </div>
<?php } ?>
  <!-- Pie de página -->
  <footer>
    <div class="text-center">
      <i class="glyphicon glyphicon-leaf"></i>
      Desarrollado por <a href="https://github.com/MiguelGonzalezAravena" target="_blank">Miguel González Aravena</a>
    </div>
  </footer>
</div>
</body>
</html>