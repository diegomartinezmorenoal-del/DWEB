
<?php
session_start();

// Inicializamos las variables
if (!isset($_SESSION["suma"])) {
    $_SESSION["suma"] = 0;
    $_SESSION["contador"] = 0;
}

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST["numero"];

    if ($numero < 0) {

        if ($_SESSION["contador"] > 0) {
            $media = $_SESSION["suma"] / $_SESSION["contador"];
            $resultado = "La media es: " . $media;
        } else {
            $resultado = "No has introducido números positivos.";
        }

        // Reiniciamos los datos
        $_SESSION["suma"] = 0;
        $_SESSION["contador"] = 0;

    } else {

        $_SESSION["suma"] += $numero;
        $_SESSION["contador"]++;

        $resultado = "Número guardado correctamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
</head>
<body>

    <h1>Calcular la media</h1>

    <form method="POST">
        <label>Introduce un número:</label>
        <input type="number" name="numero" step="any" required>
        <button type="submit">Enviar</button>
    </form>

    <p><?php echo $resultado; ?></p>

    <p>Números introducidos: 
        <?php echo $_SESSION["contador"]; ?>
    </p>

</body>
</html>
