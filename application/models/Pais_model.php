<?php

class Pais_model extends CI_Model
{
    
    public function getPaisById($id)
    {
        return R::load('pais', $id);
    }
    public function getPais()
    {   
        
        return R::findAll('pais',' order by nombre asc ');
    }
 

    public function crearPais($nombre)
    {
        $pais = R::findOne('pais','nombre=?',[$nombre]);
        $ok = ($pais ==null &&  $nombre!=null );
        if ($ok) {
            $pais = R::dispense('pais');
            
          
          
            $pais->nombre = $nombre;
           
            R::store($pais);

        } else {
            $e = ($nombre == null ? new Exception("el campo no puede estar vacio") : new Exception("el pais introducido esta duplicado"));
            throw $e;
        }}
    
       
        public function borrarpais($id){
            
            R::trash(R::load('pais',$id));
            
        }
        
    
        public  function actualizarPais( $id ,$nombre , $nombrenuevo){
          
           
            $ok = ($nombrenuevo!=null && $nombrenuevo!=$nombre );
            if ($ok) {
                
                $pais = R::load('pais', $id);
                
                
                
                $pais->nombre = $nombrenuevo;
                
                R::store($pais);
                
            } else {
                $e = ($nombrenuevo == null ? new Exception("el campo no puede estar vacio") : new Exception("el pais introducido esta duplicado"));
                throw $e;
            
        }
  
}}

?>
