<?php
class Init extends CI_Controller{
    


    public function index() {
    $this->load->model('persona_model');
    $exite=$this->persona_model->getPersonas();
    if($exite==null){
    
    $this->persona_model->crearadmin();
    session_start();
    $_SESSION['_msg']['texto']="el administrador a sido creado correctamente <br>
el usuario  con el que te conectas es: admin<br>
la contraseña  con el que te conectas es: admin
";
 
    
    redirect(base_url() . 'msg');
        }
   
        
  
        else{
            
            frame($this,'init/bd');
        }
   
}

public function borraradmin(){
    
  
    $nombre = isset($_POST['delete']) ? $_POST['delete'] : null;
    if($nombre=="admin"){
        R::nuke();
        session_start();
        $_SESSION['_msg']['texto']="base borrada correctamnete"; 
        redirect(base_url() . 'msg');
    }
 
    
    
    
}

}
?>