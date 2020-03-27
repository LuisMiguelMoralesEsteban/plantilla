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
        $persona->loginname = "admin";
        $persona->nombre = "admin";
        $persona->password = password_hash("admin", PASSWORD_DEFAULT);
        R::store($persona);
    }

    public function crearPersona($loginname, $nombre, $password, $altura, $fnac, $foto, $idnace)
    {
        $personas = R::findOne('persona', 'loginname=?', [
            $loginname
        ]);
        $ok = ($personas == null && $loginname != null);
        if ($ok) {
            $persona = R::dispense('persona');
            $nace = R::load('pais', $idnace);
            
            $persona->loginname = $loginname;
            $persona->nombre = $nombre;
            $persona->password = password_hash($password, PASSWORD_DEFAULT);
            $persona->altura = $altura;
            $persona->fnac = $fnac;
            $persona->foto = $foto;
            $persona->nace = $nace;
            R::store($persona);
        } else {
            $e = ($loginname == null ? new Exception("nulo") : new Exception("duplicado"));
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
