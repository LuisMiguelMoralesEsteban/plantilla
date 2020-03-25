<?php

class Pais_model extends CI_Model
{
   
 
    public function getPais()
    {
        return R::findAll('pais');
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
            $e = ($nombre == null ? new Exception("nulo") : new Exception("duplicado"));
            throw $e;
        }}
    
       

        
    

  
}

?>
