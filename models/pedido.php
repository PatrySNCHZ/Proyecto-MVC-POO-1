<?php

class Pedido {

private $id;
private $usuario_id;
private $provincia;
private $localidad;
private $direccion;
private $coste;
private $estado;
private $fecha;
private $hora;
private $db;

public function __construct() {
$this->db = Database::connect();
}

public function getId() {
return $this->id;
}

public function getUsuario_id() {
return $this->usuario_id;
}

public function getProvincia() {
return $this->provincia;
}

public function getLocalidad() {
return $this->localidad;
}

public function getDireccion() {
return $this->direccion;
}

public function getCoste() {
return $this->coste;
}

public function getEstado() {
return $this->estado;
}

public function getFecha() {
return $this->fecha;
}

public function getHora() {
return $this->hora;
}

public function setId($id) {
$this->id = $id;
}

public function setUsuario_id($usuario_id) {
$this->usuario_id = $usuario_id;
}

public function setProvincia($provincia) {
$this->provincia = $this->db->real_escape_string($provincia);
}

public function setLocalidad($localidad) {
$this->localidad = $this->db->real_escape_string($localidad);
}

public function setDireccion($direccion) {
$this->direccion = $this->db->real_escape_string($direccion);
}

public function setCoste($coste) {
$this->coste = $coste;
}

public function setEstado($estado) {
$this->estado = $estado;
}

public function setFecha($fecha) {
$this->fecha = $fecha;
}

public function setHora($hora) {
$this->hora = $hora;
}

public function getAll() {
$pedidos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
return $pedidos;
}

public function getOne() {
$pedido = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
return $pedido->fetch_object();
}

public function save() {
    $sql = "INSERT INTO pedidos VALUES(NULL,{$this->getUsuario_id()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'Confirmed',CURDATE(),CURTIME())";

//        echo $sql;
//        if (!$mysqli->query($sql)) {
//            echo 'Error: ', $mysqli->error;
//        }

    $save = $this->db->query($sql);



$result = false;
    if ($save) {
    $result = true;
    }
    return $result;
    }

    
//public function save_linea(){
//    $sql = "SELECT LAST_INSERT_ID() as 'pedido_id";
//
//    $query = $this->db->query($sql);
//    $pedido_id = $query->fetch_object()->pedido_id;
//    
//    var_dump($pedido_id);
//
//
//
}