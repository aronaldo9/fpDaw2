<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="fpDaw2/entornoServidor/prueba23.php?control=1">opcion con imagen</a> - <a href="?control=0">opcion sin imagen</a>
    <h1>hola mundo</h1>
    <p>Esto es un texto</p>
    <?php
        $images[] = "./40623wide.jpg";
        $images[] = "2.jpg";
        $image = "./40623wide.jpg";
        echo "pepe";
        if (!empty($_GET['control'])) {
            if ($_GET['control'] == 1) {
                echo '<img src="'.$image.'" width="100px" />';
            } else {
                echo 'no hay imagen';
            }
        }
    ?>       
    <?php
        if ($control) {
            echo '<img src="'.$images[0].'" width="100px" />';
        } else {
            echo '<img src="'.$images[1].'" width="100px" />';
        }
    ?>
    <ul>
    <?php
        for ($i = 0; $i < sizeof($images); $i++) {
            echo '<li><img src="'.$images[$i].'" width="100px"></li>';
        }
    ?>    
    </ul>
</body>
</html>