<?php

class Categoria_model extends CI_Model
{
    public function getCategoria($id)
    {
        
        return R::load('categoria',$id);
    }
    
 
    
    public function getCategorias()
    {
        return R::findAll('categoria',' order by nombre asc ');
    }

   

    public function crearCategoria($nombre)
    {
        $categorias = R::findOne('categoria', 'nombre=?', [
            $nombre
        ]);
        
       
        
        $ok = ($categorias==null && $nombre != null );
        if ($ok) {
            $categoria = R::dispense('categoria');
           
            
           
           $categoria->nombre = $nombre;   
         
                    
            
               
           
         
       
           
            
           
           
            R::store($categoria);
            
        } else {
            $e = ($nombre == null ? new Exception("no se permite campo nombre vacio") : new Exception(" los datos introducidos estan duplicados"));
            throw $e;
        }
    }
    public function borrarcategoria($id){
        
        R::trash(R::load('categoria',$id));
        
    }
    
    public  function actualizarcategoria( $id ,$nombre , $nombrenuevo){
        
        
        $ok = ($nombrenuevo!=null && $nombrenuevo!=$nombre );
        if ($ok) {
            
            $categoria = R::load('categoria', $id);
            
            
            
            $categoria->nombre = $nombrenuevo;
            
            R::store($categoria);
            
        } else {
            $e = ($nombrenuevo == null ? new Exception("el campo no puede estar vacio") : new Exception("la categoria introducida esta duplicada"));
            throw $e;
            
        }
    
    }}

?>
