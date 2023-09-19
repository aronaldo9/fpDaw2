<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <a href="ejercicio1.php?opcion=1">Informacion</a>
    <a href="ejercicio1.php?opcion=2">Galeria</a>
    <a href="ejercicio1.php?opcion=3">Multiplicar</a>

    <?php
    $image = './40623wide.jpg';
    $op = '';
    
    if (!empty($_GET['opcion'])) {
        if ($_GET['opcion'] == 1) {
            echo '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem nemo iure quod fugit. Vitae repudiandae iste, ratione atque illum sed corrupti eum dignissimos a maiores accusantium? Pariatur rem sapiente placeat?</p>';
        } else if ($_GET['opcion'] == 2) {
            echo '<br>';
            echo '<img src="' . $image . '" width="300px" />';
        } else {
            if(!empty($_POST['num'])) {
                $numero = $_POST['num'];

                if($_POST['accion']=="multi") {
                    $op = "mult";
                }
                else {
                    $op = 'sum';
                }
            }
            else {
                $numero = 1;
            }
            echo '<form method="POST" action="ejercicio1.php?opcion=3">
                    Numero: <input name="num" type="number"/>
                    <input type="submit" name= "accion" value="multi">
                    <input type="submit" name= "accion" value="suma">
                </form>';
            echo '<br>';
            for ($i = 0; $i < 11; $i++) {
                if($op=="mult"){
                    echo $i . " x " . $numero . " = " . $i * $numero . "<br>";
                }
                else {
                    echo $i . " + " . $numero . " = " . ($i + $numero) . "<br>";
                }
            }
        }
    }
    ?>


</body>

</html>