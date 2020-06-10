<?php

class Persona extends CI_Controller
{
  
    public function d()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $idventa=isset($_POST['idventa']) ? $_POST['idventa'] : null;
        $idlineaventa=isset($_POST['idlineaventa']) ? $_POST['idlineaventa'] : null;
        $this->load->model('persona_model');
        $this->persona_model->borrarpersona($id,$idventa,$idlineaventa);
        redirect(base_url() . 'persona/r');
        
    }
    
    
    public function u()
    {
        $this->load->model('persona_model');
    
        
        $this->load->model('pais_model');
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $datos['paises'] = $this->pais_model->getPais();
        
        $datos['persona'] = $this->persona_model->getPersonaById($id);
        
        
        frame($this,'persona/u',$datos);
        
    }
    
    
   
    
    public function uPost()
    {
        $this->load->model('persona_model');
        $loginname = isset($_POST['loginname']) ? $_POST['loginname'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $password = isset($_POST['pwd']) ? $_POST['pwd'] : null;
        $altura = isset($_POST['altura']) ? $_POST['altura'] : null;
        $foto = $_FILES["foto"]["name"];
        
        $fnac = isset($_POST['fnac']) ? $_POST['fnac'] : null;
        
        $idnace = isset($_POST['idnace']) ? $_POST['idnace'] : null;
        $venta = isset($_POST['venta']) ? $_POST['venta'] : null;
        $idpersona= isset($_POST['idpersona']) ? $_POST['idpersona'] : null;
        
        try {
            $directorio = "C:\worpresphp\LuismiguelCI\assets\upload\persona-".$nombre.".png";
            $existefichero = is_file( $directorio );
            if ( $existefichero==false ) {
                $this->cargar_archivo($nombre);
            } else {
                
                unlink($directorio);
                $this->cargar_archivo($nombre);}
                
                
                
                $this->persona_model->actualizarPersona($loginname,$nombre,$password,$altura,$fnac,$idnace,$venta,$foto,$idpersona);
                
                session_start();
                
                session_start();
                $_SESSION['_msg']['texto']="usuario actualizado correctamnete";
                redirect(base_url() . 'msg');
        }
        catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto']=$e->getMessage();
            $_SESSION['_msg']['uri']='persona/c';
            redirect(base_url() . 'msg');
        }
    }
    
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
        $foto = $_FILES["foto"]["name"];
        
        $fnac = isset($_POST['fnac']) ? $_POST['fnac'] : null;
        
        $idnace = isset($_POST['idnace']) ? $_POST['idnace'] : null;
        $venta = isset($_POST['venta']) ? $_POST['venta'] : null;
       
        try {
            $directorio = "C:\worpresphp\LuismiguelCI\assets\upload\persona-".$nombre.".png";
            $existefichero = is_file( $directorio );
            if ( $existefichero==false ) {
                $this->cargar_archivo($nombre);
            } else {
               
                unlink($directorio); 
                $this->cargar_archivo($nombre);}
                
            
          
            $this->persona_model->crearPersona($loginname,$nombre,$password,$altura,$fnac,$idnace,$venta,$foto);
           
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
        $this->load->model('persona_model');
        
        $datos['personas'] = $this->persona_model->getPersonas();
      
        frame($this,'persona/r',$datos);
    }
    
   
}
?>