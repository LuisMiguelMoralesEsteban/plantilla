<?php

class Producto_model extends CI_Model
{

    public function borrarproducto($id){
        
        R::trash(R::load('producto',$id));
        
    }
    
    public function getProducto()
    {
        return R::findAll('producto');
    }
    public function getProductoById($id)
    {
        return R::load('producto', $id);
    }
    
    

    public function crearProducto($nombre,$stock,$precio,$fnac,$categoria)
    {
       
       
        
        $ok = ($productos == null && $nombre != null );
        if($categoria!=0){
            
            if ($ok) {
                $producto = R::dispense('producto');
                
                $categoria = R::load('categoria', $categoria);
                
                
                $producto->nombre = $nombre;
                $producto->stock = $stock;
                $producto->precio = $precio;
                $producto->fnac = $fnac;
                
                /* $directorio = "C:\worpresphp\LuismiguelCI\assets\upload\persona-".$nombre.".png";
                
                $existefichero = is_file( $directorio );
                if ( $existefichero==true ) {
                $ruta="\assets\upload\persona-".$nombre.".png";
                } else {
                $ruta="\assets\upload\persona-default.png";
                }
                
                
                
                $persona->foto = $ruta;*/
                
                
                
                
                $producto->categoria = $categoria;
                
                
                
                
                
                
                
                
                R::store($producto);
                
            } else {
                $e = ($nombre == null  ? new Exception("no se permite campo loginname vacio ") : new Exception(" los datos introducidos estan duplicados"));
                
                throw $e;
            }
            
            
        }else{
            
            
            $e =  new Exception("no se permite campo  categoria vacio") ;
            
            throw $e;
        }
      
     
    }

   
}

?>

