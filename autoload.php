<?php

function controllers_autoload($classname){  // creamos la funcion
    include 'controllers/'.$classname.'.php'; // incluimos la carpeta controler y la variable que incluye los nombres de los controladores
    
}

spl_autoload_register('controllers_autoload'); // esta función carga el método 