<?php

class Aficion extends CI_Controller
{
    
    
    public function d()
    {       
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        
        $this->load->model('aficion_model');
        $this->aficion_model->borraraficion($id);
        redirect(base_url() . 'aficion/r');
      
    }
    
    
    public function u()
    {
        
        $this->load->model('aficion_model');
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $datos['aficion'] = $this->aficion_model-> getaficionById($id);
      
       
        frame($this,'aficion/u' ,$datos);
     
    }
    
    public function uPost()
    {
        $this->load->model('aficion_model');
        
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $nombrenuevo = isset($_POST['nombrenuevo']) ? $_POST['nombrenuevo'] : null;
        
        
        try {
            $this->aficion_model->actualizaraficion( $id ,$nombre , $nombrenuevo);
            redirect(base_url() . 'aficion/r');
        }
        catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto']=$e->getMessage();
            $_SESSION['_msg']['uri']='aficion/c';
            redirect(base_url() . 'msg');
        }
    }
    
    
   public function c()
    {
        
        frame($this,'aficion/c');
    }

    public function cPost()
    {
        $this->load->model('aficion_model');
    
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
      
      
        try {
            $this->aficion_model->crearAficion($nombre);
            redirect(base_url() . 'aficion/r');
        }
        catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto']=$e->getMessage();
            $_SESSION['_msg']['uri']='aficion/c';
            redirect(base_url() . 'msg');
        }
    }

    public function r()
    {
       

  
        $this->load->model('aficion_model');
        
        $datos['aficiones'] = $this->aficion_model->getaficiones();
       
       
     
        frame($this,'aficion/r',$datos);
    }
}
?>