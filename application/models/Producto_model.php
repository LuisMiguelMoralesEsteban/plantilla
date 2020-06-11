<?php

class Producto_model extends CI_Model
{
    
    public function actualizarproducto($nombre,$stock,$precio,$idcategoria,$foto,$idproducto){
        
        
        $productos = R::findOne('producto', 'nombre=?', [
            $nombre
        ]);
        
        
        
        $ok = ($productos == null && $nombre != null );
        if ($ok) {
            
            
            $producto = R::load('producto', $idproducto);
            $categoria = R::load('categoria', $idcategoria);
           
            

            $producto->nombre = $nombre;
            $producto->stock = $stock;
            $producto->precio = $precio;
          
            
            
            $directorio = "C:\worpresphp\LuismiguelCI\assets\upload\producto-".$nombre.".png";
            $existefichero = is_file( $directorio );
            
            if($foto!=null){
                
                if ( $existefichero==true ){
                    $extension="png";
                }else{
                    
                    
                    
                    
                    
                    $a=new Exception("extension imagen no valida");
                    throw $a;
                    
                }}
                
                $producto->categoria = $categoria;
                            
                $producto->foto = $extension;
                
                
                
           
                
                
                
                
                
                
                
                
                
                
                
                
                R::store($producto);
                
                
                
                
                
        } else {
            $e = ($nombre == null ? new Exception("no se permite campo nombre vacio") : new Exception(" los datos introducidos estan duplicados") );
            
            throw $e;
            
            
            
        }
        
        
        
        
    }

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
    
    

    public function crearProducto($nombre,$stock,$precio,$categoria,$foto)
    {
       
       
        
        $ok = ($productos == null && $nombre != null );
        if($categoria!=0){
            
            if ($ok) {
                $producto = R::dispense('producto');
                
                $categoria = R::load('categoria', $categoria);
                
                
                $producto->nombre = $nombre;
                $producto->stock = $stock;
                $producto->precio = $precio;
              
                
                $directorio = "C:\worpresphp\LuismiguelCI\assets\upload\producto-".$nombre.".png";
                $existefichero = is_file( $directorio );
                $extension="";
                if($foto!=null){
                    
                    if ( $existefichero==true ){
                        $extension="png";
                    }else{
                        
                        
                        
                        
                        
                        $a=new Exception("extension imagen no valida");
                        throw $a;
                        
                    }}
               
                    $producto->foto = $extension;
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

