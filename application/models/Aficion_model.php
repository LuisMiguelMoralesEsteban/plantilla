<?php

class Aficion_model extends CI_Model
{
    
    public function getaficionById($id)
    {
        return R::load('aficion', $id);
    }
    public function getaficiones()
    {   
        
        return R::findAll('aficion',' order by nombre asc ');
    }
 

    public function crearAficion($nombre)
    {
        $aficion = R::findOne('aficion','nombre=?',[$nombre]);
        $ok = ($aficion ==null &&  $nombre!=null );
        if ($ok) {
            $aficion = R::dispense('aficion');
            
          
          
            $aficion->nombre = $nombre;
           
            R::store($aficion);

        } else {
            $e = ($afion == null ? new Exception("el campo no puede estar vacio") : new Exception("la aficion introducida esta duplicada"));
            throw $e;
        }}
    
       
        public function borraraficion($id){
            
            R::trash(R::load('aficion',$id));
            
        }
        
    
        public  function actualizaraficion( $id ,$nombre , $nombrenuevo){
          
           
            $ok = ($nombrenuevo!=null && $nombrenuevo!=$nombre );
            if ($ok) {
                
                $aficion = R::load('aficion', $id);
                
                
                
                $aficion->nombre = $nombrenuevo;
                
                R::store($aficion);
                
            } else {
                $e = ($nombrenuevo == null ? new Exception("el campo no puede estar vacio") : new Exception("la aficion introducida esta duplicada"));
                throw $e;
            
        }
  
}


}

?>
