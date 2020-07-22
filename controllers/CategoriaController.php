<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class CategoriaController {

    public function index() {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getOne();
        require_once 'views/categoria/index.php';
    }

    public function ver(){
        
        if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        // Conseguir categoria
        $categoria = new Categoria();
        $categoria->setId($id); 
        $cat = $categoria->getOne();
        
        
        // Conseguir productos
        $producto = new Producto();
        $producto->setCategoria_id($id);
        $productos = $producto->getAllCat();
        
        
     
        }
        
        
        require_once 'views/categoria/ver.php';
    }
    
    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
        
    }
    public function save(){
        Utils::isAdmin();
        
        // Guardar la categoria en bd
        if(isset($_POST) && isset($_POST['nombre'])){
        $categoria = new Categoria();
        $categoria->setNombre($_POST['nombre']);
        $categoria->save();
        }
        header("Location:".base_url."categoria/index");
    }
}
