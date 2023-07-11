<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime extends CI_Controller {
    public function index(){
      
        $this->load->view('regime');
       
    }
    public function pdf(){
      
        $this->load->view('pdf');
       
    }
}