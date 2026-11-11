
<?php
session_start();

if (!isset($_SESSION["suma"])) {
    $_SESSION["suma"] = 0;
    $_SESSION["contador"] = 0;
}

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST["numero"];

    if ($_SESSION["suma"] <= 10000) {

        $_SESSION["suma"] += $numero;
        $_SESSION["contador"]++;

        if ($_SESSION["suma"] > 10000) {

            $media = $_SESSION["suma"] / $_SESSION["contador"];

            $resultado = "Suma total: " . $_SESSION["suma"] . "<br>";
            $resultado .= "Números introducidos: " . $_SESSION["contador"] . "<br>";
            $resultado .= "Media: " . $media;

            // Reiniciar
            $_SESSION["suma"] = 0;
            $_SESSION["contador"] = 0;

        } else {
            $resultado = "Suma actual: " . $_SESSION["suma"];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>
</head>
<body>

<h1>Sumar hasta 10.000</h1>

<form method="POST">
    <label>Introduce un número:</label>
    <input type="number" name="numero" min="0" required>
    <button type="submit">Añadir</button>
</form>

<p><?php echo $resultado; ?></p>

</body>
</html>
