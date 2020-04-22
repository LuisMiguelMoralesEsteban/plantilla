<?php

class Pais extends CI_Controller
{
    
    
    public function d()
    {       
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        
        $this->load->model('Pais_model');
        $this->Pais_model->borrarpais($id);
        redirect(base_url() . 'Pais/r');
      
    }
   
    
    public function u()
    {
        
        $this->load->model('Pais_model');
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $datos['pais'] = $this->Pais_model-> getPaisById($id);
      
       
        frame($this,'Pais/u' ,$datos);
     
    }
    
    public function uPost()
    {
        $this->load->model('Pais_model');
        
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $nombrenuevo = isset($_POST['nombrenuevo']) ? $_POST['nombrenuevo'] : null;
        
        
        try {
            $this->Pais_model->actualizarPais( $id ,$nombre , $nombrenuevo);
            redirect(base_url() . 'Pais/r');
        }
        catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto']=$e->getMessage();
            $_SESSION['_msg']['uri']='Pais/c';
            redirect(base_url() . 'msg');
        }
    }
    
    
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
        $this->load->model('Persona_model');

  
        $this->load->model('Pais_model');
        
        $datos['paises'] = $this->Pais_model->getPais();
        $datos['personas'] = $this->Persona_model-> getPersonas();
       
     
        frame($this,'pais/r', $datos);
    }
}
?>