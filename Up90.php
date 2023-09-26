<?php
$target_dir = "uploads/";  // Pasta onde o vídeo será armazenado
$target_file = $target_dir . basename($_FILES["video"]["name"]);  // Nome do arquivo de destino
$uploadOk = 1;
$videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verifica se o arquivo é um vídeo
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["video"]["tmp_name"]);
  if($check !== false) {
    echo "O arquivo é um vídeo - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "O arquivo não é um vídeo.";
    $uploadOk = 0;
  }
}

// Move o arquivo para a pasta de destino
if ($uploadOk == 0) {
  echo "Desculpe, seu vídeo não foi enviado.";
} else {
  if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
    echo "O vídeo ". htmlspecialchars(basename( $_FILES["video"]["name"])). " foi enviado.";
  } else {
    echo "Desculpe, houve um erro ao enviar seu vídeo.";
  }
}
?>