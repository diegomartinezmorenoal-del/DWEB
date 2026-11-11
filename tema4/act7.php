
<?php

// Color inicial
$color = "#ffffff";

// Recuperar color de la cookie
if (isset($_COOKIE["color"])) {
    $color = $_COOKIE["color"];
}

// Cambiar color
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nuevoColor = $_POST["color"];

    // Comprobar que es un color hexadecimal válido
    if (preg_match('/^#[0-9a-fA-F]{6}$/', $nuevoColor)) {

        setcookie("color", $nuevoColor, time() + (86400 * 30), "/");

        $color = $nuevoColor;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Color de fondo</title>
</head>

<body style="background-color: <?php echo htmlspecialchars($color); ?>;">

<h1>Mi página web</h1>

<p>Esta página guarda el color de fondo utilizando cookies.</p>

<form method="POST">

    <label>Selecciona un color:</label>

    <input type="color" name="color" value="<?php echo htmlspecialchars($color); ?>">

    <button type="submit">Cambiar color</button>

</form>

<p>Color actual: <?php echo htmlspecialchars($color); ?></p>

</body>
</html>
