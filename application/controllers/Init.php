<?php
class Init extends CI_Controller{

    public function index() {
    $this->load->model('persona_model');
    $exite=$this->persona_model->getPersonas();
    if($exite==null){
    $this->persona_model->crearadmin();
    
    redirect(base_url());
    }
    else{
        
        show_404();
    }
}


}
?>