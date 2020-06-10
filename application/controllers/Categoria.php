<?php

class Categoria extends CI_Controller
{
  
  
   
    
    public function c()
    {
      
        frame($this,'Categoria/c');
    }

    public function cPost()
    {
        $this->load->model('categoria_model');
      
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
       
       
        try {
            
            $this->categoria_model->crearCategoria($nombre);
           
            session_start();
           
            session_start();
            $_SESSION['_msg']['texto']="categoria creada correctamnete";
            redirect(base_url() . 'msg');
        }
        catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto']=$e->getMessage();
            $_SESSION['_msg']['uri']='categoria/c';
            redirect(base_url() . 'msg');
        }
    }
   

   public function r()
    {
   
        $this->load->model('categoria_model');
        $datos['categorias'] = $this->categoria_model->getCategorias();
      
        frame($this,'categoria/r',$datos);
    }
    
    public function d()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        
        $this->load->model('categoria_model');
        $this->categoria_model->borrarcategoria($id);
        redirect(base_url() . 'categoria/r');
        
    }
    
    public function u()
    {
        
        $this->load->model('categoria_model');
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $datos['categoria'] = $this->categoria_model-> getCategoria($id);
        
        
        frame($this,'categoria/u' ,$datos);
        
    }
    
    public function uPost()
    {
        $this->load->model('categoria_model');
        
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $nombrenuevo = isset($_POST['nombrenuevo']) ? $_POST['nombrenuevo'] : null;
        
        
        try {
            $this->categoria_model->actualizarcategoria( $id ,$nombre , $nombrenuevo);
            redirect(base_url() . 'categoria/r');
        }
        catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto']=$e->getMessage();
            $_SESSION['_msg']['uri']='categoria/c';
            redirect(base_url() . 'msg');
        }
    }
   
}
?>