<?php

class Persona extends CI_Controller
{
  
  
   
    
    public function c()
    {
        $this->load->model('pais_model');
        $datos['paises'] = $this->pais_model->getPais();
        frame($this,'Persona/c',$datos);
    }

    public function cPost()
    {
        $this->load->model('persona_model');
        $loginname = isset($_POST['loginname']) ? $_POST['loginname'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $password = isset($_POST['pwd']) ? $_POST['pwd'] : null;
        $altura = isset($_POST['altura']) ? $_POST['altura'] : null;
        $fnac = isset($_POST['fnac']) ? $_POST['fnac'] : null;
        $foto = isset($_POST['foto']) ? $_POST['foto'] : null;
        $idnace = isset($_POST['idnace']) ? $_POST['idnace'] : null;
        
        try {
            $this->persona_model->crearPersona($loginname,$nombre,$password,$altura,$fnac,$foto,$idnace);
            redirect(base_url() . 'persona/r');
        }
        catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto']=$e->getMessage();
            $_SESSION['_msg']['uri']='persona/c';
            redirect(base_url() . 'msg');
        }
    }

    public function r()
    {
        $this->load->model('persona_model');
        $this->load->model('pais_model');
        $datos['personas'] = $this->persona_model->getPersonas();
      
        frame($this,'persona/r', $datos);
    }
}
?>