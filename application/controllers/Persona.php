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
        
        $idnace = isset($_POST['idnace']) ? $_POST['idnace'] : null;
       
        try {
            $this->cargar_archivo($nombre);
            $this->persona_model->crearPersona($loginname,$nombre,$password,$altura,$fnac,$idnace);
           
            session_start();
           
            session_start();
            $_SESSION['_msg']['texto']="usuario creado correctamnete";
            redirect(base_url() . 'msg');
        }
        catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto']=$e->getMessage();
            $_SESSION['_msg']['uri']='persona/c';
            redirect(base_url() . 'msg');
        }
    }
    function cargar_archivo($nombre ) {
       
        
        $mi_archivo = 'foto';
       
        $config['upload_path'] = "C:\worpresphp\LuismiguelCI\assets\upload";
      
        $config['file_name'] ="persona-".$nombre.".png";
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
           
           
            return;
        }
        
       
    }

    public function r()
    {
        $this->load->model('persona_model');
        $this->load->model('pais_model');
     
      
        frame($this,'persona/r');
    }
    
   
}
?>