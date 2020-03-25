<?php

class Anonymous extends CI_Controller
{
    
   

    public function registrar()
    {
        $this->load->model('pais_model');
       
        
       
        frame($this,'_hdu/anonymous/registrar');
    }

    public function registrarPost()
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
            $this->persona_model->crearadmin($loginname,$nombre,$password,$altura,$fnac,$foto,$idnace);
            redirect(base_url() );
        }
        catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto']=$e->getMessage();
            $_SESSION['_msg']['uri']='_hdu/anonymous/registrar';
            redirect(base_url() . 'msg');
        
    }}

    public function login()
    {
        frame($this, '_hdu/anonymous/login');
    }

    public function loginPost()
    {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $password = isset($_POST['pwd']) ? $_POST['pwd'] : null;
        $this->load->model('persona_model');
        try {
            $persona = $this->persona_model->verificarLogin($nombre, $password);
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['persona'] = $persona;
            redirect(base_url());
        } catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto'] = $e->getMessage();
            $_SESSION['_msg']['uri'] = '';
            redirect(base_url() . 'msg');
        }
    }
    
}

?>