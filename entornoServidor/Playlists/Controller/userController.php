<?php



if (!empty($_POST['login'])) {
    $user = UserRepository::validar($_POST['username'], $_POST['password']);
    if ($user) {
        // El usuario se autenticó correctamente, almacenar en la sesión
        $_SESSION['user'] = $user;
        
        // Redirigir al usuario a la página de inicio
        header("Location: index.php"); 
        exit();
    } 
    // else {
    //     // Las credenciales son incorrectas, mostrar mensaje de error o redirigir a la página de inicio de sesión
    //     // header("Location: index.php?c=user&action=login&error=1");
    // }
}


if($_GET['action'] == "login") {
    include("View/loginView.phtml");
    die;
}

if($_GET['action'] == "register") {
    include("View/registerView.phtml");
    die;
}


if(!empty($_GET['logout'])){
    session_destroy();
    session_start();
}



if ($_GET['action'] == "register") {
    // Verificar si se envió el formulario de registro
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Verificar si las contraseñas coinciden
        if ($password === $confirm_password) {
            // Hashear la contraseña utilizando MD5
            $hashed_password = md5($password);

            // Conectar a la base de datos y agregar el usuario
            UserRepository::registUsers($username, $hashed_password);

            // Después de registrar al usuario, puedes redirigirlo a la página de inicio o a la de inicio de sesión
            header("Location: index.php?c=user&action=login");
            exit();
        } else {
            echo 'alert("Las contraseñas no coinciden")';
        }
    } else {
        echo 'alert("Debes completar todos los campos")';
    }
}




?>