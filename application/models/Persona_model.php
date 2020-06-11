<?php

class Persona_model extends CI_Model
{
    public function borrarpersona($id,$idventa){
        
        R::trash(R::load('persona',$id));
        R::trash(R::load('venta',$idventa));
     
     
    }
    
    
    public function getPersonaById($id)
    {
        return R::load('persona', $id);
    }
    
    public function getPersonas()
    {
        return R::findAll('persona');
    }
    
    public function getventas()
    {
        return R::findAll('venta');
    }
    
    public function getventaById($id)
    {
        return R::load('venta', $id);
    }
    
    public function actualizarPersona($loginname,$nombre,$password,$altura,$fnac,$idnace,$venta,$foto,$idpersona)
    
    {
        $personas = R::findOne('persona', 'loginname=?', [
            $loginname
        ]);
        
        
        
        $ok = ($personas == null && $loginname != null );
        if ($ok) {
            
         
            $persona = R::load('persona', $idpersona);
            $nace = R::load('pais', $idnace);
            $gusta = R::load('aficion');
            $nogusta = R::load('aficion');
            
            $persona->loginname = $loginname;
            $persona->nombre = $nombre;
            $persona->password = password_hash($password, PASSWORD_DEFAULT);
            $persona->altura = $altura;
            $persona->fnac = $fnac;
            
            
            $directorio = "C:\worpresphp\LuismiguelCI\assets\upload\persona-".$nombre.".png";
            $existefichero = is_file( $directorio );
            
            if($foto!=null){
                
                if ( $existefichero==true ){
                    $extension="png";
                }else{
                    
                    
                    
                    
                    
                    $a=new Exception("extension imagen no valida");
                    throw $a;
                    
                }}
                
                
                  
                
                
               
                
                
                
               if( $idnace!=0){
                    $persona->nace = $nace;
               }else{
                   $persona->nace=null;
               }
               
               
               
                
                
                
                
             
                
                
                
                
                R::store($persona);
                
                
                
                
                
        } else {
            $e = ($loginname == null ? new Exception("no se permite campo loginname vacio") : new Exception(" los datos introducidos estan duplicados") );
            
            throw $e;
            
            
            
        }
    }
    
    
    
   

    public function crearadmin()
    {
        $persona = R::dispense('persona');
   
        $persona->loginname = "admin";
        $persona->nombre = "admin";
        $persona->password = password_hash("admin", PASSWORD_DEFAULT);
        R::store($persona);
      
       
    }

    public function crearPersona($loginname, $nombre, $password, $altura, $fnac, $idnace,$venta,$foto)
    {
        $personas = R::findOne('persona', 'loginname=?', [
            $loginname
        ]);
        
       
        
        $ok = ($personas == null && $loginname != null );
        if ($ok) {
            
            $persona = R::dispense('persona');
            $ventas = R::dispense('venta');
          
            $nace = R::load('pais', $idnace);
            $gusta = R::load('aficion',null);
            $nogusta = R::load('aficion',null);
            $persona->loginname = $loginname;
            $persona->nombre = $nombre;
            $persona->password = password_hash($password, PASSWORD_DEFAULT);
            $persona->altura = $altura;
            $persona->fnac = $fnac;
         
          
                $directorio = "C:\worpresphp\LuismiguelCI\assets\upload\persona-".$nombre.".png";
            $existefichero = is_file( $directorio );
          
            if($foto!=null){
                
            if ( $existefichero==true ){
                    $extension="png";
                }else{
                    
               
                    
                   
                        
                        $a=new Exception("extension imagen no valida");
                        throw $a;
                        
                }}
                    
                 
                
                    
                    
                    
                
            
            
            
        
            
          
            
            
            
            $persona->foto = $extension;
           
            
            
            if( $idnace!=0){
                $persona->nace = $nace;
            }
            else{}
          
            
           
         
       
               
               $d=date("Y-m-d") ;
             
               $ventas->fecha= $d;
         
              $persona->ventaencurso=$ventas;                    
              
              
              R::store($persona);
              
              $ventas->personaencurso= $persona;
              $persona->nogusta=gusta;
              $persona->nogusta=nogusta;
              
              R::store($ventas);
            
       
            
        } else {
            $e = ($loginname == null ? new Exception("no se permite campo loginname vacio") : new Exception(" los datos introducidos estan duplicados") );
            
            throw $e;
            
           
            
        }
    }

    public function verificarLogin($nombre, $password)
    {
        $usuario = R::findOne('persona', 'nombre=?', [
            $nombre
        ]);
        if ($usuario == null) {
            throw new Exception("Usuario o contraseña no correctas");
        }
        if (! password_verify($password, $usuario->password)) {
            throw new Exception("Usuario o contraseña no correctas");
        }
        return $usuario;
    }
}

?>
