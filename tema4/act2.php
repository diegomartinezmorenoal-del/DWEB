
<?php
session_start();

if (!isset($_SESSION["contador"])) {
    $_SESSION["contador"] = 0;
    $_SESSION["sumaImpares"] = 0;
    $_SESSION["contadorImpares"] = 0;
    $_SESSION["mayorPar"] = null;
}

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST["numero"];

    if ($numero < 0) {

        $resultado = "Cantidad de números: " . $_SESSION["contador"] . "<br>";

        if ($_SESSION["contadorImpares"] > 0) {
            $media = $_SESSION["sumaImpares"] / $_SESSION["contadorImpares"];
            $resultado .= "Media de impares: " . $media . "<br>";
        } else {
            $resultado .= "No has introducido números impares.<br>";
        }

        if ($_SESSION["mayorPar"] !== null) {
            $resultado .= "Mayor de los pares: " . $_SESSION["mayorPar"];
        } else {
            $resultado .= "No has introducido números pares.";
        }

        // Reiniciar sesión
        $_SESSION["contador"] = 0;
        $_SESSION["sumaImpares"] = 0;
        $_SESSION["contadorImpares"] = 0;
        $_SESSION["mayorPar"] = null;

    } else {

        $_SESSION["contador"]++;

        if ($numero % 2 != 0) {
            $_SESSION["sumaImpares"] += $numero;
            $_SESSION["contadorImpares"]++;
        }

        if ($numero % 2 == 0) {
            if ($_SESSION["mayorPar"] === null ||
                $numero > $_SESSION["mayorPar"]) {
                $_SESSION["mayorPar"] = $numero;
            }
        }

        $resultado = "Número guardado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
</head>
<body>

<h1>Estadísticas de números</h1>

<form method="POST">
    <label>Introduce un número:</label>
    <input type="number" name="numero" required>
    <button type="submit">Enviar</button>
</form>

<p><?php echo $resultado; ?></p>

<p>Números introducidos: <?php echo $_SESSION["contador"]; ?></p>

</body>
</html>
