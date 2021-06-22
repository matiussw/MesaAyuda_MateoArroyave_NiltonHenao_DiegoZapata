   
<?php
  include_once 'includes/User.php';
  include_once 'includes/UserSession.php';
   
$userSession = new UserSession();
$user = new User();


if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once 'vista/home.php';

}else if(isset($_POST['txtUsername']) && isset($_POST['txtPassword'])){
    
    $userForm = $_POST['txtUsername'];
    $passForm = $_POST['txtPassword'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once 'vista/home.php';
    }else{
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'vista/vistaLogin.php';
    }
}else{
    //echo "login";
    include_once 'vista/vistaLogin.php';
}



?>
