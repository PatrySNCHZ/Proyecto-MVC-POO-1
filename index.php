<?php 

session_start();

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


//Conexion base de datos
$db = Database::connect();


function show_error(){
    $error = new errorController();
    $error->index();
}

        // Nos saca el texto "Sacando a los usuarios" y también el formulario.

//$controlador = new UsuarioController();
//$controlador->mostrarTodos();
//$controlador->crear();


// Comprobar si existe el controlador y si existe la clase

if (isset($_GET['controller'])){  // SI existe el controlador 
$nombre_controlador = $_GET['controller'].'Controller'; // nombramos a la variable con el get y el controller
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;
    
}else{
    show_error(); // si el controlador no existe aparece este mensaje
    exit();
}

// Comprobar que existe la clase. 


if(class_exists($nombre_controlador)){ // Si la clase con el nombre de la variable controlador existe
    $controlador = new $nombre_controlador(); // instanciamos el objeto
    
        // Automaticamente cargue los controladores y los cargue en la pagina index  
    
if(isset($_GET['action']) && method_exists($controlador, $_GET['action']) ) { // Si la acción existe y además existe el metodo en el controlador al que llamamos
     
    $action = $_GET['action']; // la variable acción toma el nombre de la acción pasada por URL
  
    $controlador->$action(); // el controlador llama a la acción 
    
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){  
    $action_default = action_default;
    $controlador->$action_default();
}else{

    show_error();
}

}else{
    show_error();
}

require_once 'views/layout/footer.php';