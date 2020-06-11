


<?php

class Producto extends CI_Controller
{
  
    public function u()
    {
        $this->load->model('categoria_model');
        
        
        $this->load->model('producto_model');
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $datos['categorias'] = $this->categoria_model->getCategorias();
        
        $datos['producto'] = $this->producto_model->getProductoById($id);
        
        
        frame($this,'producto/u',$datos);
        
    }
    
    
    
    
    public function uPost()
    {
        $this->load->model('producto_model');
       
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $stock = isset($_POST['stock']) ? $_POST['stock'] : null;
        $precio = isset($_POST['precio']) ? $_POST['precio'] : null;
        $foto = $_FILES["foto"]["name"];
        
       
        $idcategoria= isset($_POST['idcategoria']) ? $_POST['idcategoria'] : null;
      
        $idproducto= isset($_POST['idproducto']) ? $_POST['idproducto'] : null;
        
        try {
            $directorio = "C:\worpresphp\LuismiguelCI\assets\upload\producto-".$nombre.".png";
            $existefichero = is_file( $directorio );
            if ( $existefichero==false ) {
                $this->cargar_archivo($nombre);
            } else {
                
                unlink($directorio);
                $this->cargar_archivo($nombre);}
                
                
                
                $this->producto_model->actualizarproducto($nombre,$stock,$precio,$idcategoria,$foto,$idproducto);
                
                session_start();
                
                session_start();
                $_SESSION['_msg']['texto']="producto actualizado correctamnete";
                redirect(base_url() . 'msg');
        }
        catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto']=$e->getMessage();
            $_SESSION['_msg']['uri']='producto/c';
            redirect(base_url() . 'msg');
        }
    }
    
    
    public function d()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        
        $this->load->model('producto_model');
        $this->producto_model->borrarproducto($id);
        redirect(base_url() . 'producto/r');
        
    }
    
    
    public function c()
    {
        $this->load->model('producto_model');
        
       $this->load->model('categoria_model');
         $datos['categorias'] = $this->categoria_model->getCategorias();
         $datos['productos'] = $this->producto_model->getProducto();
         
        frame($this,'producto/c',$datos);
    }

    public function cPost()
    {
        $this->load->model('producto_model');
        
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $stock = isset($_POST['stock']) ? $_POST['stock'] : null;
        $precio = isset($_POST['precio']) ? $_POST['precio'] : null;
        $foto = $_FILES["foto"]["name"];
        
      
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
       
        try {
            $this->cargar_archivo($nombre);
            
            $this->producto_model->crearProducto($nombre,$stock,$precio,$categoria,$foto);
           
            session_start();
           
            session_start();
            $_SESSION['_msg']['texto']="producto creado correctamnete";
            redirect(base_url() . 'msg');
        }
        catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto']=$e->getMessage();
            $_SESSION['_msg']['uri']='producto/c';
            redirect(base_url() . 'msg');
        }
    }
    function cargar_archivo($nombre ) {
       
        
        $mi_archivo = 'foto';
       
        $config['upload_path'] = "C:\worpresphp\LuismiguelCI\assets\upload";
      
        $config['file_name'] ="producto-".$nombre.".png";
        $config['allowed_types'] = 'png|gif|jpeg|jpg';
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
        
        $this->load->model('categoria_model');
        $this->load->model('producto_model');
        $datos['productos'] = $this->producto_model->getProducto();
        $datos['categorias'] = $this->categoria_model->getCategorias();
     
      
        frame($this,'producto/r',$datos);
    }
    
   
}
?>