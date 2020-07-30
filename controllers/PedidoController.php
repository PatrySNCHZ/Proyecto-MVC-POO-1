<?php

require_once 'models/pedido.php';

class pedidoController{
        public function hacerpedido(){
            
            require_once 'views/pedido/hacerpedido.php';
        }
        
        public function add(){
            //var_dump($_POST);

         
            
            if(isset($_SESSION['identity'])){
                $usuario_id = $_SESSION['identity']->id;
                $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
                $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
                $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
                
                $stats = Utils::statsCarrito();
                $coste = $stats['total'];
                
              
              
                
            if($provincia && $localidad && $direccion){
                // Guardar pedido
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);
               
                $save = $pedido->save();
                    
                  if ($save) {
                    $_SESSION['producto'] = "complete";
                } else {
                    $_SESSION['producto'] = "failed";
                }
                
            } else {
                $_SESSION['producto'] = "failed";
            }           
                
            }else{
                // Redirigir al index
                header("Location:".base_url);
            }
            
            
            
        }
        
        }