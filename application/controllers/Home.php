<?php 
        
class Home extends CI_Controller {
    public function index() {
    $this->load->model('persona_model');
   
        frame($this,'home/index');
    }
}

?>