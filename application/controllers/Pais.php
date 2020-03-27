<?php

class Pais extends CI_Controller
{

   
    
    public function c()
    {
        
        frame($this,'Pais/c');
    }

    public function cPost()
    {
        $this->load->model('Pais_model');
    
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
      
      
        try {
            $this->Pais_model->crearPais($nombre);
            redirect(base_url() . 'Pais/r');
        }
        catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto']=$e->getMessage();
            $_SESSION['_msg']['uri']='Pais/c';
            redirect(base_url() . 'msg');
        }
    }

    public function r()
    {
        $this->load->model('Pais_model');
        $datos['pais'] = $this->Pais_model->getPais();
        frame($this,'pais/r', $datos);
    }
}
?>