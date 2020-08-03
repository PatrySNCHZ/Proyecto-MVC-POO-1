<?php

class Utils {

    public static function deleteSession($name) {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function isAdmin() {
        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function isIdentity() {
        if (!isset($_SESSION['identity'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function showStatus($status) {
        $value = "Pendiente";
        if ($status == "Confirmed") {
            $value = "Pendiente";
        } elseif ($status == "Preparation") {
            $value = "En preparación";
        } elseif ($status == "Ready") {
            $value = "Preparado para el envío";
        } elseif ($status == "Sent") {
            $value = "Enviado";
        }

        return $value;
    }

    public static function showcategorias() {
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }

    public static function statsCarrito() {
        $stats = array(
            'count' => 0,
            'total' => 0
        );

        if (isset($_SESSION['carrito'])) {
//            $stats['count'] = count($_SESSION['carrito']);

            foreach ($_SESSION['carrito'] as $index => $producto) {
                $stats['count'] += $producto['unidades'];
                $stats['total'] += $producto['precio'] * $producto['unidades'];
            }
        }

        return $stats;
    }

}
