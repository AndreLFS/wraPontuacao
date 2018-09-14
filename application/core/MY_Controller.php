<?php 
 
class MY_Controller extends CI_Controller {
 
 	public function __construct(){
            parent::__construct();
			$logado = $this->session->userdata("logado");
			if (empty($logado)){
				redirect(base_url());	
			} 		
       }
}