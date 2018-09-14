<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vendedora extends CI_controller {
	function __construct(){
        parent::__construct();
        $this->load->model("Cliente_model", 'cliente');
    }
    public function getVendedoraPraca(){
        $praca = $this->input->post('idPraca');
        echo $praca;
        echo $this->cliente->select_Vendedora($praca);
    }
        
}