<?php

class Anonymous extends CI_Controller
{
    
   

 
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