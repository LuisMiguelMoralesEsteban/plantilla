<?php

class Persona_model extends CI_Model
{
   
    
    public function getPersonas()
    {
        return R::findAll('persona');
    }

    public function crearadmin()
    {
        $persona = R::dispense('persona');
        $pais = R::dispense('pais');
        $persona->loginname = "admin";
        $persona->nombre = "admin";
        $persona->password = password_hash("admin", PASSWORD_DEFAULT);
        R::store($persona);
        $pais->nombre = "---";
        R::store($pais);
       
    }

    public function crearPersona($loginname, $nombre, $password, $altura, $fnac, $idnace)
    {
        $personas = R::findOne('persona', 'loginname=?', [
            $loginname
        ]);
        
       
        
        $ok = ($personas == null && $loginname != null );
        if ($ok) {
            $persona = R::dispense('persona');
            $nace = R::load('pais', $idnace);
            
            $persona->loginname = $loginname;
            $persona->nombre = $nombre;
            $persona->password = password_hash($password, PASSWORD_DEFAULT);
            $persona->altura = $altura;
            $persona->fnac = $fnac;
            
            $directorio = "C:\worpresphp\LuismiguelCI\assets\img\persona-".$nombre.".png";
            
            $existefichero = is_file( $directorio );
            if ( $existefichero==true ) {
                $ruta="\assets\img\persona-".$nombre.".png";
            } else {
                $ruta="\assets\img\persona-default.png";
            }
            
            
            
            $persona->foto = $ruta;
           
            
            
          
            $persona->nace = $nace;
            
            R::store($persona);
        } else {
            $e = ($loginname == null ? new Exception("no se permite campo loginname vacio") : new Exception("datos introducidos duplicados"));
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
