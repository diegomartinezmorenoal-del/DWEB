<?php
session_start();

$cookie_name = "votos_encuesta";

if (isset($_COOKIE[$cookie_name])) {
    $votos_guardados = json_decode($_COOKIE[$cookie_name], true);
    $_SESSION['votos_si'] = $votos_guardados['si'] ?? 0;
    $_SESSION['votos_no'] = $votos_guardados['no'] ?? 0;
} else {
    if (!isset($_SESSION['votos_si'])) $_SESSION['votos_si'] = 0;
    if (!isset($_SESSION['votos_no'])) $_SESSION['votos_no'] = 0;
}

if (isset($_POST['voto'])) {
    if ($_POST['voto'] === 'SI') {
        $_SESSION['votos_si']++;
    } elseif ($_POST['voto'] === 'NO') {
        $_SESSION['votos_no']++;
    }

    $votos_actuales = [
        'si' => $_SESSION['votos_si'],
        'no' => $_SESSION['votos_no']
    ];

    setcookie($cookie_name, json_encode($votos_actuales), time() + (90 * 24 * 60 * 60));
    
    // REDIRECCIÓN CORREGIDA A ejercicio2.php
    header("Location: ejercicio2.php");
    exit();
}

$votos_si = $_SESSION['votos_si'];
$votos_no = $_SESSION['votos_no'];
$total = $votos_si + $votos_no;

$porcentaje_si = $total > 0 ? round(($votos_si / $total) * 100) : 0;
$porcentaje_no = $total > 0 ? round(($votos_no / $total) * 100) : 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 - Encuesta</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; }
        .box { border: 1px solid #ccc; padding: 20px; max-width: 450px; }
        .bar-container { background-color: #e0e0e0; height: 25px; margin: 8px 0; border-radius: 5px; overflow: hidden; }
        .bar-si { background-color: #4CAF50; height: 100%; text-align: right; color: white; line-height: 25px; padding-right: 5px; font-size: 12px; }
        .bar-no { background-color: #f44336; height: 100%; text-align: right; color: white; line-height: 25px; padding-right: 5px; font-size: 12px; }
        .btn-group input { padding: 8px 25px; font-size: 16px; margin-right: 10px; cursor: pointer; }
        .back-btn { margin-top: 15px; display: inline-block; color: #333; }
    </style>
</head>
<body>
    <div class="box">
        <h3>¿Crees que actualmente hay corrupción en el gobierno?[cite: 83]</h3>
        
        <p>SI: <?= $votos_si ?> votos (<?= $porcentaje_si ?>%)</p>
        <div class="bar-container">
            <div class="bar-si" style="width: <?= $porcentaje_si ?>%;"><?= $porcentaje_si > 0 ? $porcentaje_si.'%' : '' ?></div>
        </div>

        <p>NO: <?= $votos_no ?> votos (<?= $porcentaje_no ?>%)</p>
        <div class="bar-container">
            <div class="bar-no" style="width: <?= $porcentaje_no ?>%;"><?= $porcentaje_no > 0 ? $porcentaje_no.'%' : '' ?></div>
        </div>

        <br>
        <form method="post" action="ejercicio2.php" class="btn-group">
            <input type="submit" name="voto" value="SI">
            <input type="submit" name="voto" value="NO">
        </form>
        <br>
        <a href="../../index.php" class="back-btn">← Volver al menú principal</a>
    </div>
</body>
</html>