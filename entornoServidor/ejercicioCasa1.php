<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EjercicioCasa1</title>
</head>
<body>
    <?php
        // Verifica si los parámetros existen en la URL
        if (isset($_GET['num1']) && isset($_GET['num2'])) {
            $num1 = (int)$_GET['num1'];  // Convierte a entero
            $num2 = (int)$_GET['num2'];  // Convierte a entero

            // Llama a la función suma y muestra el resultado
            echo "La suma de $num1 y $num2 es: " . suma($num1, $num2);
        } else {
            echo "Por favor, proporciona los parámetros num1 y num2 en la URL.";
        }

        function suma($num1, $num2) {
            $total = $num1 + $num2;
            return $total;
        }
    ?>
</body>
</html>
