<?php

class lineaventa extends CI_Controller
{
    
    
    /*public function d()
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
    }*/
  
    
    public function c()
    {
        $this->load->model('producto_model');
        $this->load->model('persona_model');
      
        $datos['productos'] = $this->producto_model->getProducto();
        $datos['ventas'] = $this->persona_model->getventas();
        frame($this,'lineaventa/c',$datos);
    }

    public function cPost()
    {
        $this->load->model('lineaventa_model');
    
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : null;
        $idproducto = isset($_POST['idproducto']) ? $_POST['idproducto'] : null;
        $idventa = isset($_POST['idventa']) ? $_POST['idventa'] : null;
      
      
        $this->lineaventa_model->crearlineaventa($cantidad,$idproducto,$idventa);
            redirect(base_url() . 'lineaventa/r');
        
       
    }

    public function r()
    {
        $this->load->model('lineaventa_model');

  
        
       
     
        frame($this,'lineaventa/r');
    }
}
?>