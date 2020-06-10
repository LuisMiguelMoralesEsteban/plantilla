<?php

class lineaventa_model extends CI_Model
{
    
  /*  public function getPaisById($id)
    {
        return R::load('pais', $id);
    }
    public function getPais()
    {   
        
        return R::findAll('pais',' order by nombre asc ');
    }*/
 

    public function crearlineaventa($cantidad,$idproducto,$idventa)
    {
       
            $lineaventa = R::dispense('lineaventa');
            $producto = R::load('producto', $idproducto);
            $venta = R::load('venta', $idventa);
            
          
          
            $lineaventa->cantidad =$cantidad;
           $lineaventa->producto=$producto;
           $lineaventa->venta=$venta;
            R::store($lineaventa);

        }
        
    
       
   /*     public function borrarpais($id){
            
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
  */
}

?>
